<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WSController extends Controller {

    public $layout = '';

    public function actionIndex() {
       
        if ($_REQUEST['record_set'] == 'product') {
            $model = new Product;
            $allBooks = $model->getWsAllBooks();
            $this->layout = "";
            echo CJSON::encode($allBooks);
        } else if ($_REQUEST['record_set'] == 'product_category') {
            $model = new Product;
            $allBooks = $model->getWsAllBooksByCategory();
            $this->layout = "";
            echo CJSON::encode($allBooks);
        }
    }

}

?>
