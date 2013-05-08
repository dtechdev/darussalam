<?php

class DefaultController extends Controller {

    public function init() {
        // note that we disable the layout
        $this->layout = false;
        parent::init();
    }

    public function actionIndex() {


        //require_once(dirname(__FILE__).'/../wp/wp-load.php');
        //print_r('../wp/wp-load.php');exit;

        try {
            wp();
           
            require_once(ABSPATH . WPINC . '/template-loader.php');
            require_once(ABSPATH . '/wp-config.php');
        
            if (get_class($user) == "WP_Error") {
                die("oops- wrong user/pass?");
            }

            Yii::app()->end();
        }
        // if we threw an exception in a WordPress functions.php
        // when we find a 404 header, we could use our main Yii
        // error handler to handle the error, log as desired
        // and then throw the exception on up the chain and
        // let Yii handle things from here
        // without the above, WordPress becomes our 404 error
        // handler for the entire Yii app
        catch (Exception $e) {
            throw $e;
        }
    }

    public function actionWpLogin() {

        //require_once(dirname(__FILE__).'/../wp/wp-load.php');
        //print_r('../wp/wp-load.php');exit;

        try {
            wp();
       
            require_once(ABSPATH  . 'wp-admin/index.php');
            require_once(ABSPATH . '/wp-config.php');
            // require_once( "wordpress/wp-config.php" );
// see if the call failed
            if (get_class($user) == "WP_Error") {
                die("oops- wrong user/pass?");
            }

            Yii::app()->end();
        }
        // if we threw an exception in a WordPress functions.php
        // when we find a 404 header, we could use our main Yii
        // error handler to handle the error, log as desired
        // and then throw the exception on up the chain and
        // let Yii handle things from here
        // without the above, WordPress becomes our 404 error
        // handler for the entire Yii app
        catch (Exception $e) {
            throw $e;
        }
    }

}