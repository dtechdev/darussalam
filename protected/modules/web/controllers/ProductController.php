<?php

class ProductController extends Controller {

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
                'actions' => array('viewcart', 'editcart', 'allproducts',
                    'featuredproducts', 'bestsellings', 'productdetail', 'productlisting',
                    'paymentmethod'),
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

    public function actionViewcart() {


        Yii::app()->user->SiteSessions;
        $ip = Yii::app()->request->getUserHostAddress();
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';


        $cart_model = new Cart();
        if (isset(Yii::app()->user->id)) {
            $cart = $cart_model->findAll('city_id=' . Yii::app()->session['city_id'] . ' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
        } else {
            $cart = $cart_model->findAll('city_id=' . Yii::app()->session['city_id'] . ' AND session_id="' . $ip . '"');
        }


        $this->render('viewcart', array('cart' => $cart));
    }

    public function actionEditcart() {

        if ($_REQUEST['type'] == 'delete_cart') {
            $cart_model = new Cart();
            $cart_model->findByPk($_REQUEST['cart_id'])->delete();
            //$this->redirect('/product/viewcart');
        } else {
            $cart_model = new Cart();
            $cart = $cart_model->find('cart_id=' . $_REQUEST['cart_id']);
            $cart_model = $cart;
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->save();
        }
        echo CJSON::encode(array('redirect' => $this->createUrl('/web/product/viewcart')));
    }

    //front site actions
    public function actionallProducts() {
        //queries 
        Yii::app()->controller->layout = '//layouts/main';
        Yii::app()->user->SiteSessions;

        $order_detail = new OrderDetail;
        $all_products = $order_detail->allProducts();

        $categories = new Categories();
        $allCategories = $categories->allCategories();


        $this->render('all_products', array('products' => $all_products, 'allCate' => $allCategories));
    }

    public function actionfeaturedProducts() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        //queries 
        $order_detail = new OrderDetail;
        $featured_products = $order_detail->featuredBooks();

        $categories = new Categories();
        $allCategories = $categories->allCategories();

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('featured_products', array('products' => $featured_products, 'allCate' => $allCategories));
    }

    public function actionbestSellings() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        //queries 
        $order_detail = new OrderDetail;
        $best_sellings = $order_detail->bestSellings();

        $categories = new Categories();
        $allCategories = $categories->allCategories();

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('best_sellings', array('products' => $best_sellings, 'allCate' => $allCategories));
    }

    public function actionproductListing() {
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        $this->render('product_listing');
    }

    public function actionproductDetail() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];

        $product_obj = new Product();
        $product = $product_obj->find($condition = 'product_id=' . $_REQUEST['product_id']);

        Yii::app()->controller->layout = '//layouts/main';
        /**
         *  getting value of poduct rating
         */
        $rating_value = ProductReviews::model()->calculateRatingValue($product->product_id);

        $this->render('product_detail', array('product' => $product, "rating_value" => $rating_value));
    }

    public function actionpaymentMethod() {
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        $error = array('status' => false);
        $model = new CreditCardForm();
        if (isset($_POST['CreditCardForm'])) {
            $model->attributes = $_POST['CreditCardForm'];
            $error = $this->CreditCardPayment($model);
            if ($error) {
                if (!$error['status']) {
                    $this->redirect(array('/web/product/confirmOrder'));
                }
            }
        }
        $regionList = CHtml::listData(Region::model()->findAll(), 'id', 'name');
        $this->render('payment_method', array('model' => $model, 'regionList' => $regionList, 'error' => $error));
    }

    public function actionStatelist() {

        $shipping_country = $_REQUEST['CreditCardForm']['shipping_country'];
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

        $error = array();
        $auth_net_login_id = '6VxKcg8mb9hx';
        $auth_net_tran_key = '7VB59273qGmv6u2B';
        $authnet_values = array(
            "x_login" => $auth_net_login_id,
            "x_version" => "3.1",
            "x_delim_char" => "|",
            "x_delim_data" => "TRUE",
            "x_url" => "FALSE",
            "x_type" => "AUTH_CAPTURE",
            "x_method" => "CC",
            "x_tran_key" => $auth_net_tran_key, "x_relay_response" => "FALSE",
            "x_card_num" => $model->card_number1 . $model->card_number2 . $model->card_number3 . $model->card_number4,
            "x_exp_date" => $model->exp_month . $model->exp_year,
            "x_description" => Yii::app()->session['description'],
            "x_amount" => Yii::app()->session['total_price'],
            "x_first_name" => $model->first_name,
            "x_last_name" => $model->last_name,
            "x_address" => $model->shipping_address1,
            "x_city" => $model->shipping_city,
            "x_state" => $model->shipping_state,
            "x_zip" => $model->shipping_zip,
        );

        $fields = "";
        foreach ($authnet_values as $key => $value)
            $fields .= "$key=" . urlencode($value) . "&";

        $ch = curl_init("https://certification.authorize.net/gateway/transact.dll");
        curl_setopt($ch, CURLOPT_HEADER, 0); // removes HTTP headers from response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Returns response data
        curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($fields, "& ")); // use HTTP POST to send form data
        $authorize_response = curl_exec($ch); //execute post and get results
        curl_close($ch);

        // This line takes the response and breaks it into an array using the specified delimiting character
        $response_array = explode($authnet_values["x_delim_char"], $authorize_response);

        if ($response_array[0] == '1') {
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
                    'product_id' => $pro->product_id,
                    'quantity' => $pro->quantity,
                    'cart_id' => $pro->cart_id,
                    'product_price' => round($pro->product->product_price, 2),
                    'total_price' => round($pro->product->product_price * $pro->quantity, 2),
                );
            }

            $order->setRelationRecords('orderDetails', is_array($ordetail['OrderDetail']) ? $ordetail['OrderDetail'] : array());

            $order->save();
            //approved- Your order completed successfully
        } elseif ($response_array[0] == '2') {
            $error['status'] = true;
            $error['message'] = $response_array[3];
            //Declined
        } else {
            $error['status'] = true;
            $error['message'] = $response_array[3];
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

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
