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
                'actions' => array('viewcart', 'editcart', 'viewwishlist', 'editwishlist', 'allproducts',
                    'featuredproducts', 'bestsellings', 'productdetail', 'productlisting',
                    'productfilter',
                    'productDetailLang'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array(),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * view cart page
     */
    public function actionViewcart() {


        Yii::app()->user->SiteSessions;

        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';

        $cart = Cart::model()->getCartLists();
        
        $this->render('viewcart', array('cart' => $cart));
    }

    /**
     * set Total amount in session
     */
    public function setTotalAmountSession($grand_total,$total_quantity,$description) {
        Yii::app()->session['total_price'] = round($grand_total, 2);
        Yii::app()->session['quantity'] = $total_quantity;
        Yii::app()->session['description'] = $description;
    }

    /**
     * edit or delete cart
     */
    public function actionEditcart() {

        if ($_REQUEST['type'] == 'delete_cart') {
            $cart_model = new Cart();

            Cart::model()->deleteByPk($_REQUEST['cart_id']);
        } else {
            $cart_model = new Cart();
            $cart = $cart_model->find('cart_id=' . $_REQUEST['cart_id']);
            $cart_model = $cart;
            $cart_model->quantity = $_REQUEST['quantity'];
            $cart_model->save();
        }
        $cart = Cart::model()->getCartLists();
        $cart_list_count = Cart::model()->getCartListCount();
      

        $_view_cart = $this->renderPartial("_view_cart", array('cart' => $cart), true, true);
        echo CJSON::encode(array("_view_cart" => $_view_cart, "cart_list_count" => $cart_list_count));
    }

    /**
     * For viewing the list of product which add into wishlist
     */
    public function actionViewwishlist() {


        Yii::app()->user->SiteSessions;

        Yii::app()->theme = Yii::app()->session['layout'];
        Yii::app()->controller->layout = '//layouts/main';


        $wishlist = WishList::model()->getWishLists();

        $this->render('viewwishlist', array('wishList' => $wishlist));
    }

    /**
     * For Edit or delete the wishlist product
     */
    public function actionEditwishlist() {

        if ($_REQUEST['type'] == 'delete_wishlist') {
            $wishlist_model = new WishList();
            $wishlist_model->findByPk($_REQUEST['id'])->delete();
            /**
             * get wish list again
             */
            $wishlist = WishList::model()->getWishLists();
            $wish_list_count = WishList::model()->getWishListCount();
            $_view_list = $this->renderPartial("_view_wish_lists", array('wishList' => $wishlist), true, true);

            echo CJSON::encode(array("_view_list" => $_view_list, "wish_list_count" => $wish_list_count));
        }
    }

    //front site actions
    public function actionallProducts() {

        /**
         * ajax based
         */
        if (isset($_POST['ajax'])) {
            $this->productfilter();
        } else {
            //queries 
            Yii::app()->controller->layout = '//layouts/main';
            Yii::app()->user->SiteSessions;

            $dataProvider = Product::model()->allProducts();
            $all_products = Product::model()->returnProducts($dataProvider);

            $allCategories = Categories::model()->allCategories();


            $this->render('all_products', array(
                'products' => $all_products,
                'dataProvider' => $dataProvider,
                'allCate' => $allCategories));
        }
    }

    /**
     *  to get product on ajax bases
     *  for filter of category
     */
    public function productfilter() {
        $dataProvider = Product::model()->allProducts();
        $all_products = Product::model()->returnProducts($dataProvider);
        $this->renderPartial("_product_list", array('products' => $all_products,
            'dataProvider' => $dataProvider,));
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

    /**
     * product detail
     */
    public function actionproductDetail() {
        Yii::app()->user->SiteSessions;
        Yii::app()->theme = Yii::app()->session['layout'];


        $product = Product::model()->findByPk($_REQUEST['product_id']);

        Yii::app()->controller->layout = '//layouts/main';

        /**
         *  getting value of poduct rating
         */
        $rating_value = ProductReviews::model()->calculateRatingValue($product->product_id);

        $this->render('product_detail', array('product' => $product, "rating_value" => $rating_value));
    }

    /**
     * product detail change
     */
    public function actionproductDetailLang($id) {

        if (isset($_POST['lang_id'])) {



            $product = Product::model();

            $product = $product->findByPk($id);
            $product->productProfile = $product->productSelectedProfile;


            /**
             *  getting value of poduct rating
             */
            $rating_value = ProductReviews::model()->calculateRatingValue($product->product_id);
            $right_data = $this->renderPartial("_product_detail_data", array('product' => $product, "rating_value" => $rating_value), true, true);
            $left_data = $this->renderPartial("_product_detail_image", array('product' => $product), true, false);

            echo CJSON::encode(array(
                "right_data" => $right_data,
                "left_data" => $left_data,
            ));
        }
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
