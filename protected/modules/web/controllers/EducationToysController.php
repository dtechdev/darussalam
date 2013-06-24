<?php

/**
 * Education Toys controller
 */
class EducationToysController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
            Yii::app()->user->SiteSessions;
            


            $dataProvider = Product::model()->allProducts(array(), 30, "Educational Toys");
            $all_products = Product::model()->returnProducts($dataProvider);
            /**
             * Temporary solution
             */
            $parent_cat = Categories::model()->getParentCategoryId("Educational Toys");

            $allCategories = Categories::model()->allCategories("", $parent_cat);
            
            
            $this->render('//educationToys/index', array(
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
        $dataProvider = Product::model()->allProducts(array(), 30, "Educational Toys");
        $all_products = Product::model()->returnProducts($dataProvider);
        $this->renderPartial($this->slash."/educationToys/_product_list", array('products' => $all_products,
            'dataProvider' => $dataProvider,));
    }

    public function actionProductDetail() {
        Yii::app()->user->SiteSessions;
        
        

        $product = Product::model()->findByPk($_REQUEST['product_id']);

      

        /**
         *  getting value of poduct rating
         */
        $rating_value = ProductReviews::model()->calculateRatingValue($product->product_id);

        $this->render($this->slash.'/educationToys/product_detail', array('product' => $product, "rating_value" => $rating_value));
    }

}

?>
