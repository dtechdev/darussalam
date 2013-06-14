<?php

class WebModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'web.models.*',
            'web.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            Yii::app()->theme = 'dtech_second';
            Yii::app()->controller->layout = "//layouts/column2";
            return true;
        }
        else
            return false;
    }

}
