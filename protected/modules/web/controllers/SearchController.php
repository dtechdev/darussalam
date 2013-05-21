<?php

/**
 * Global Search function
 */
class SearchController extends Controller {

    public function actionDosearch() {
        $connection = Yii::app()->db;
        $term = $_REQUEST['term'];
        $sql = "SELECT * " .
                " FROM ( " .
                " SELECT categories.category_name as name,'cat' as module " .
                " FROM categories WHERE categories.category_name LIKE '%" . $term . "%'  LIMIT 2" .
                " UNION all " .
                " SELECT author.author_name as name ,'author_name' as module " .
                " FROM author WHERE author.author_name LIKE '%" . $term . "%' LIMIT 4 " .
                " UNION all " .
                " SELECT product.product_name as name,'prdo' as module " .
                " FROM product " .
                " WHERE product.product_name LIKE '%" . $term . "%' LIMIT 6 " .
                ") a ";


        $arr = array();

        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();

        foreach ($rows as $row) {
            $arr[] = array(
                'label' => $row['name'], // label for dropdown list          
                'value' => $row['name'], // value for input field          
                'id' => $row['name'], // return value from autocomplete
            );
        }

        echo CJSON::encode($arr);
    }

    public function actionGetSearch() {

        if (isset($_POST['serach_field'])) {
            $q = $_POST['serach_field'];

            $sql = "Select " .
                    " DISTINCT(product.product_id), " .
                    " product.product_name, " .
                    " city.short_name as city_short, " .
                    " product.city_id, " .
                    " product.authors, " .
                    // " product.languages, " .
                    " country.short_name " .
                    " FROM product " .
                    " LEFT OUTER JOIN city " .
                    " ON city.city_id = product.city_id " .
                    " LEFT OUTER JOIN author " .
                    " ON author.author_id = product.authors " .
                    " LEFT outer JOIN product_profile " .
                    " ON product_profile.product_id = product.product_id " .
                    " LEFT  JOIN language " .
                    " ON language.language_id = product_profile.language_id " .
                    " INNER JOIN country " .
                    " ON country.country_id = city.country_id " .
                    " LEFT OUTER JOIN product_categories ON " .
                    " product_categories.product_id = product.product_id " .
                    "  LEFT OUTER JOIN categories ON " .
                    " categories.category_id = product_categories.category_id " .
                    " WHERE " .
                    " ( " .
                    " product.product_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " author.author_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " categories.category_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " city.short_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " city.city_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " language.language_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " country.country_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " country.short_name LIKE '%" . $q . "%' " .
                    " OR " .
                    " categories.category_name LIKE '%" . $q . "%' ) ";
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $rows = $command->queryAll();

            $producharray = array();
            foreach ($rows as $products) {
                array_push($producharray, $products['product_id']);
            }
            $all_products = Product::model()->allProducts($producharray);
            $this->renderPartial('/product/all_products', array('products' => $all_products));

            //$this->render("search_result", array('data' => $rows));
        } else {

            Yii::app()->end();
        }
    }

    public function actionSearchDetail() {
        Yii::app()->user->SiteSessions;


        $uri = $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $_REQUEST['product_id']));
        $this->redirect($uri);
    }

}

?>
