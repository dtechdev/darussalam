<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PageController extends Controller {

    //$models=new Pages();

    public function actionViewPage($id) {
        Yii::app()->controller->layout = '//layouts/main';
        $page = Pages::model()->findByPk($id);
        if ($page->title == "FAQ's" ) {
           
           $this->render('faq_page', array('page' => $page));
         
        } else {

            $this->render('view_page', array('page' => $page));
        }
    }

}

?>
