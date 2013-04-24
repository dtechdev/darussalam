<?php

class ProductController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
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
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('viewcart', 'editcart', 'allproducts',
                    'featuredproducts', 'bestsellings', 'productdetail', 'productlisting',
                    'paymentmethod'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('confirmorder'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }


    public function actionViewcart()
    {
        

        Yii::app()->user->SiteSessions;
        $ip = Yii::app()->request->getUserHostAddress();
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        
        $cart_model = new Cart();
        if (isset(Yii::app()->user->id))
        {
            $cart = $cart_model->findAll('city_id=' . Yii::app()->session['city_id'] . ' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
        }
        else
        {
            $cart = $cart_model->findAll('city_id=' . Yii::app()->session['city_id'] . ' AND session_id="' . $ip . '"');
        }


        $this->render('viewcart', array('cart' => $cart));
    }

    public function actionEditcart()
    {

        if ($_REQUEST['type'] == 'delete_cart')
        {
            $cart_model = new Cart();
            $cart_model->findByPk($_REQUEST['cart_id'])->delete();
            //$this->redirect('/product/viewcart');
        }
        else
        {
            $cart_model = new Cart();
            $cart = $cart_model->find('cart_id=' . $_REQUEST['cart_id']);
            $cart_model = $cart;
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->save();
        }
        echo CJSON::encode(array('redirect' => $this->createUrl('/web/product/viewcart')));
    }

    //front site actions
    public function actionallProducts()
    {
        //queries 
        Yii::app()->user->SiteSessions;
        $order_detail = new OrderDetail;
        $all_products = $order_detail->allProducts();
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('all_products', array('products' => $all_products));
    }

    public function actionfeaturedProducts()
    {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        //queries 
        $order_detail = new OrderDetail;
        $featured_products = $order_detail->featuredBooks();
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('featured_products', array('products' => $featured_products));
    }

    public function actionbestSellings()
    {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        //queries 
        $order_detail = new OrderDetail;
        $best_sellings = $order_detail->bestSellings();
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('best_sellings', array('products' => $best_sellings));
    }

    public function actionproductListing()
    {
        Yii::app()->theme = Yii::app()->session['layout'];

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('product_listing');
    }

    public function actionproductDetail()
    {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];

        $product_obj = new Product();
        $product = $product_obj->find($condition = 'product_id=' . $_REQUEST['product_id']);

        Yii::app()->controller->layout = '//layouts/main';
        $this->render('product_detail', array('product' => $product));
    }

    public function actionpaymentMethod()
    {
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('payment_method');
    }

    public function actionconfirmOrder()
    {
        Yii::app()->user->SiteSessions;
        $ip = getenv("REMOTE_ADDR");
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        $cart_model = new Cart();
        if (isset(Yii::app()->user->id))
        {
            $cart = $cart_model->findAll('city_id=' . Yii::app()->session['city_id'] . ' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
        }
        else
        {
            $cart = $cart_model->findAll('city_id=' . Yii::app()->session['city_id'] . ' AND session_id="' . $ip . '"');
        }


        $this->render('confirm_order', array('cart' => $cart));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Product::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
