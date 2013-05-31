<?php

/*
 * to handle error from all the system
 */

class ErrorController extends Controller {

    public function actionError() {
        Yii::app()->controller->layout = '//layouts/main';
        $error = Yii::app()->errorHandler->error;
        if ($error)
            $this->render('error', array('error' => $error));
        else
            throw new CHttpException(404, 'Page not found.');
    }
    
    public function actionUnconfigured() {
        $this->layout = '';
        $error['message'] = " Site is not configured , please contact Darussalam admin!";
        if ($error)
            $this->renderPartial('error', array('error' => $error));
        else
            throw new CHttpException(404, 'Page not found.');
    }
    
    

}

?>
