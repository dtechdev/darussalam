<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class WSController extends Controller {

    public $layout = '';

    public function actionIndex() {
        echo CJSON::encode(array("status" => "Connection Established"));
    }

}

?>
