<?php

/**
 * 
 */
class OthersController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';

    /**
     * for category filter
     * @var type 
     */
    public $is_cat_filter = false;

    //front site actions
    public function actionIndex() {

        $this->is_cat_filter = true;
        /**
         * ajax based
         */
        if (isset($_POST['ajax'])) {
            $this->productfilter();
        } else {
            //queries 
            Yii::app()->controller->layout = '//layouts/main';
            Yii::app()->user->SiteSessions;


            $dataProvider = Product::model()->allProducts(array(), 30, "Others");
            $all_products = Product::model()->returnProducts($dataProvider);
            /**
             * Temporary solution
             */
            $parent_cat = Categories::model()->getParentCategoryId("Others");

            $allCategories = Categories::model()->allCategories("", $parent_cat);


            $this->render('index', array(
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
        $dataProvider = Product::model()->allProducts(array(), 30, "Others");
        $all_products = Product::model()->returnProducts($dataProvider);
        $this->renderPartial("_product_list", array('products' => $all_products,
            'dataProvider' => $dataProvider,));
    }

    public function actionProductDetail() {
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

}

?>
