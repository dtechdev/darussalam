<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WSController extends Controller {

    public $layout = '';

    public function actionIndex() {
        if(!isset($_REQUEST['record_set'])){
            echo CJSON::encode(array("No Selection"));
            return true;
        }
        if ($_REQUEST['record_set'] == 'product') {
            $model = new ProductWS;
            $allBooks = $model->getWsAllBooks();
            $this->layout = "";
            echo CJSON::encode($allBooks);
        } else if ($_REQUEST['record_set'] == 'product_category') {
            $model = new ProductWS;
            $allBooks = $model->getWsAllBooksByCategory();

            $this->layout = "";
            echo CJSON::encode($allBooks);
        }
    }

    /*
     * Iphon service to Send All categories
     * in Daraussalam Database
     * 
     */

    public function actionAllCategories() {
        $categories = Categories::model()->findAll();

        try {
            $ret_array = array();
            $ret_array['error'] = '';
            $ret_array['data'] = $categories;
            $ret_array['count'] = count($categories);
            echo CJSON::encode($ret_array);
        } Catch (Exception $e) {
            echo CJSON::encode(array("error" => $e->getCode()));
        }
    }

    /*
     * Iphon service to Send All categories
     * in Daraussalam Database
     * 
     */

    public function actionRequestedCategory($category_id = 0) {
        $requested_cat = ProductWS::model()->getWsRequestByCategory($category_id);
        try {
            $requested_product_arr = array();
            $requested_product_arr['error'] = '';
            $requested_product_arr['data'] = $requested_cat;
            $requested_product_arr['count'] = count($requested_cat);
            echo CJSON::encode($requested_product_arr);
        } catch (Exception $e) {
            echo CJSON::encode(array("error" => $e->getCode()));
        }
    }

}

?>
