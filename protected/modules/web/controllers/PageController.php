<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PageController extends Controller {
    
    //$models=new Pages();
    
    public function actionViewPage($id)
    {
   
         $page = Pages::model()->findByPk($id);
                 
         $this->render('view_page',array('page'=>$page));
    }
    
}

?>
