<?php

class PaymentController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('paymentmethod'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('confirmorder', 'statelist'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionpaymentMethod() {
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        $error = array('status' => false);
        $model = new CreditCardForm();
        if (isset($_POST['UserProfile'])) {
            $model->attributes = $_POST['UserProfile'];
            $error = $this->CreditCardPayment($model);
            if ($error) {

                if (!$error['status']) {

                    //save the shipping information of user
                    $userProfile_model = UserProfile::model();
                    $userProfile_model->saveShippingInfo($_POST['UserProfile']);
                    $this->redirect(array('/web/payment/confirmOrder'));
                }
            }
        } else {
            $model = UserProfile::model()->findByPk(Yii::app()->user->id);
        }

        $regionList = CHtml::listData(Region::model()->findAll(), 'id', 'name');
        $this->render('payment_method', array('model' => $model, 'regionList' => $regionList, 'error' => $error));
    }

    public function actionStatelist() {

        $shipping_country = $_REQUEST['UserProfile']['shipping_country'];
        $stateList = Subregion::model()->findAll('region_id=' . $shipping_country);

        $stateList = CHtml::listData($stateList, 'code', 'name');
        echo CHtml::tag('option', array('value' => ''), 'Select State', true);
        foreach ($stateList as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    /**
     * Function for credit card payment using authorize.net api
     * @param type $model
     * @return type
     */
    public function CreditCardPayment($model) {

        Yii::import('application.extensions.anet_php_sdk.AuthorizeNetException');

        define("AUTHORIZENET_API_LOGIN_ID", "9f84PWNhV9");
        define("AUTHORIZENET_TRANSACTION_KEY", "7A4Wfgq47Uv6zU93");
        define("AUTHORIZENET_SANDBOX", true);

        $author_rize = new AuthorizeNetException();
        $sale = new AuthorizeNetAIM;


        $sale->setFields(
                array(
                    'amount' => Yii::app()->session['total_price'],
                    'card_num' => $model->card_number1 . $model->card_number2 . $model->card_number3 . $model->card_number4,
                    'exp_date' => $model->exp_month . $model->exp_year,
                    'first_name' => $model->first_name,
                    'last_name' => $model->last_name,
                    'address' => $model->shipping_address1,
                    'city' => $model->shipping_city,
                    'state' => $model->shipping_state,
                    'country' => "",
                    'zip' => $model->shipping_zip,
                    'email' => Yii::app()->user->name,
                    'card_code' => "123",
                )
        );

        $response = $sale->authorizeAndCapture();

        if ($response->approved) {
            $transaction_id = $response->transaction_id;

            $error['status'] = false;
            $error['message'] = 'Payment successfully';

            //payment was completed successfully
            $order = new Order;
            $order->user_id = Yii::app()->user->id;
            $order->total_price = Yii::app()->session['total_price'];
            $order->order_date = date('Y-m-d');

            $ordetail = array();
            $cart_model = new Cart();
            $cart = $cart_model->findAll('user_id=' . Yii::app()->user->id);

            foreach ($cart as $pro) {
                $ordetail['OrderDetail'][] = array(
                    'product_profile_id' => $pro->product_profile_id,
                    'quantity' => $pro->quantity,
                    'cart_id' => $pro->cart_id,
                    'product_price' => round($pro->productProfile->price, 2),
                    'total_price' => round($pro->productProfile->price * $pro->quantity, 2),
                );
            }

            $order->setRelationRecords('orderDetails', is_array($ordetail['OrderDetail']) ? $ordetail['OrderDetail'] : array());

            $order->save();
            //approved- Your order completed successfully
        } elseif ($response->declined) {
            $error['status'] = true;
            $error['message'] = $response->response_reason_text;
            //Declined
        } else {
            $error['status'] = true;
            $error['message'] = $response->response_reason_text;
            //error
        }
        return $error;
    }

    public function actionconfirmOrder() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('confirm_order');
    }
}