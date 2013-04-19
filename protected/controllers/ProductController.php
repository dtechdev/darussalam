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
                'actions' => array('index', 'view', 'addtocart','viewcart','editcart','allproducts','featuredproducts','bestsellings','productdetail','productlisting','paymentmethod'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','confirmorder'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('create'),
                'expression' => 'Yii::app()->user->isAdmin',
            //the 'user' var in an accessRule expression is a reference to Yii::app()->user
            ),
            array('allow',
                'actions' => array('admin', 'delete'),
                'expression' => 'Yii::app()->user->isSuperAdmin',
            //the 'user' var in an accessRule expression is a reference to Yii::app()->user
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Product;
        $mProductProfile = new ProductProfile;
        $mProductDiscount = new ProductDiscount;
        $mProductImage = new ProductImage;
        $mProductCategories = new ProductCategories;
        $cityList = CHtml::listData(City::model()->findAll(), 'city_id', 'city_name');
        $languageList = CHtml::listData(Language::model()->findAll(), 'language_id', 'language_name');
        $authorList = CHtml::listData(Author::model()->findAll(), 'author_id', 'author_name');


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            $model->added_date = time();
            if ($model->save()) {
                $product_id = $model->product_id;
                $mProductProfile->attributes = $_POST['ProductProfile'];
                $mProductProfile->product_id = $product_id;
                $mProductProfile->save();

                $mProductDiscount->attributes = $_POST['ProductDiscount'];
                $mProductDiscount->product_id = $product_id;
                $mProductDiscount->save();

                $this->redirect(array('view', 'id' => $model->product_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'mProductProfile' => $mProductProfile,
            'mProductDiscount' => $mProductDiscount,
            'mProductImage' => $mProductImage,
            'mProductCategories' => $mProductCategories,
            'cityList' => $cityList,
            'languageList' => $languageList,
            'authorList' => $authorList
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        $mProductDiscount = new ProductDiscount;
        $mProductImage = new ProductImage;
        $mProductCategories = new ProductCategories;

        $mProductProfileArray = ProductProfile::model()->findAll(array('condition' => 'product_id="' . $model->product_id . '"'));
        $mProductProfile = ProductProfile::model()->findByPk($mProductProfileArray[0]['profile_id']);


        $mProductDiscountArray = ProductDiscount::model()->findAll(array('condition' => 'product_id="' . $model->product_id . '"'));
        if ($mProductDiscountArray != NULL) {
            $mProductDiscount = ProductDiscount::model()->findByPk($mProductDiscountArray[0]['discount_id']);
        }

        $mProductImageArray = ProductImage::model()->findAll(array('condition' => 'product_id="' . $model->product_id . '"'));
        if ($mProductImageArray != NULL) {
            $mProductImage = ProductImage::model()->findByPk($mProductImageArray[0]['product_image_id']);
        }

        $mProductCategoriesArray = ProductCategories::model()->findAll(array('condition' => 'product_id="' . $model->product_id . '"'));
        if ($mProductCategoriesArray != NULL) {
            $mProductCategories = ProductCategories::model()->findByPk($mProductCategoriesArray[0]['product_category_id']);
        }



        $cityList = CHtml::listData(City::model()->findAll(), 'city_id', 'city_name');
        $languageList = CHtml::listData(Language::model()->findAll(), 'language_id', 'language_name');
        $authorList = CHtml::listData(Author::model()->findAll(), 'author_id', 'author_name');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Product'])) {
            $model->attributes = $_POST['Product'];
            if ($model->save()) {
                $product_id = $id;
                $mProductProfile->attributes = $_POST['ProductProfile'];
                $mProductProfile->product_id = $product_id;
                $mProductProfile->save();

                $mProductDiscount->attributes = $_POST['ProductDiscount'];
                $mProductDiscount->product_id = $product_id;
                $mProductDiscount->save();
                $this->redirect(array('view', 'id' => $model->product_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'mProductProfile' => $mProductProfile,
            'mProductDiscount' => $mProductDiscount,
            'mProductImage' => $mProductImage,
            'mProductCategories' => $mProductCategories,
            'cityList' => $cityList,
            'languageList' => $languageList,
            'authorList' => $authorList
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Product');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Product('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Product']))
            $model->attributes = $_GET['Product'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAddtocart() {

        $ip = getenv("REMOTE_ADDR");
        $cart_model = new Cart();
        if (isset(Yii::app()->user->id)) {
            $cart = $cart_model->find('product_id=' . $_REQUEST['product_id'] . ' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
            $ip='';
        } else {
            $cart = $cart_model->find('product_id=' . $_REQUEST['product_id'] . ' AND session_id="' . $ip . '"');
        }
        if ($cart != null) {
            $cart_model = $cart;
            $cart_model->quantity = $cart->quantity + $_REQUEST['quantity'];
        } else {
            $cart_model = new Cart();
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->product_id = $_REQUEST['product_id'];
            $cart_model->user_id = Yii::app()->user->id;
            $cart_model->city_id = Yii::app()->session['city_id'];
            $cart_model->added_date = time();
            $cart_model->session_id = $ip;
            ;
        }
        $cart_model->save();

        //count total added products in cart
        if (isset(Yii::app()->user->id)) {
            $tot = Yii::app()->db->createCommand()
                    ->select('sum(quantity) as cart_total')
                    ->from('cart')
                    ->where('city_id='.Yii::app()->session['city_id'].' AND user_id=' . Yii::app()->user->id)
                    ->queryRow();
        } else {
            $tot = Yii::app()->db->createCommand()
                    ->select('sum(quantity) as cart_total')
                    ->from('cart')
                    ->where('city_id='.Yii::app()->session['city_id'].' AND session_id="' . $ip . '"')
                    ->queryRow();
        }

        echo CJSON::encode(array('product_id' => '1', 'cart_counter' => $tot['cart_total']));
    }
    public function actionViewcart() {
        
        Yii::app()->user->SiteSessions;
        $ip = getenv("REMOTE_ADDR");
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';
        
                $cart_model = new Cart();
        if (isset(Yii::app()->user->id)) {
            $cart = $cart_model->findAll('city_id='.Yii::app()->session['city_id'].' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
        } else {
            $cart = $cart_model->findAll('city_id='.Yii::app()->session['city_id'].' AND session_id="' . $ip . '"');
        }
        
        
        $this->render('viewcart',array('cart'=>$cart));
    }

    public function actionEditcart() {

        if($_REQUEST['type']=='delete_cart')
        {
            $cart_model = new Cart();
            $cart_model->findByPk($_REQUEST['cart_id'])->delete();
            //$this->redirect('/product/viewcart');
        
        }else{
            $cart_model = new Cart();
            $cart = $cart_model->find('cart_id=' . $_REQUEST['cart_id']);
            $cart_model = $cart;
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->save();
        }
        echo CJSON::encode(array('redirect'=>$this->createUrl('/product/viewcart')));
    }

    
    //front site actions
    public function actionallProducts() {
        //queries 
        Yii::app()->user->SiteSessions;
        $order_detail = new OrderDetail;
        $all_products = $order_detail->allProducts();
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('all_products',array('products'=>$all_products));
    }
    public function actionfeaturedProducts() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        //queries 
        $order_detail = new OrderDetail;
        $featured_products = $order_detail->featuredBooks();
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('featured_products',array('products'=>$featured_products));
    }

    public function actionbestSellings() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];
        //queries 
        $order_detail = new OrderDetail;
        $best_sellings = $order_detail->bestSellings();
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('best_sellings',array('products'=>$best_sellings));
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
        $product=$product_obj->find($condition='product_id='.$_REQUEST['product_id']);
        
        Yii::app()->controller->layout = '//layouts/main';
        $this->render('product_detail',array('product'=>$product));
    }
    public function  actionpaymentMethod()
    {
     Yii::app()->theme = Yii::app()->session['layout'];
     Yii::app()->controller->layout = '//layouts/main';
        $this->render('payment_method');
        
    }

    public function  actionconfirmOrder()
    {
        Yii::app()->user->SiteSessions;
        $ip = getenv("REMOTE_ADDR");
        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';
        
                $cart_model = new Cart();
        if (isset(Yii::app()->user->id)) {
            $cart = $cart_model->findAll('city_id='.Yii::app()->session['city_id'].' AND (user_id=' . Yii::app()->user->id . ' OR session_id="' . $ip . '")');
        } else {
            $cart = $cart_model->findAll('city_id='.Yii::app()->session['city_id'].' AND session_id="' . $ip . '"');
        }
        
        
        $this->render('confirm_order',array('cart'=>$cart));
        
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

    /**
     * Performs the AJAX validation.
     * @param Product $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
