<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting import class
 *  
 */
$url_manager = array(
    'urlFormat' => 'path',
    'showScriptName' => true,
    'rules' => array(
        '' => '/site/index',
        /** Product detail **/
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>' => '/site/storehome',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/featuredProducts' => '/web/product/featuredProducts',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/bestSellings' => '/web/product/bestSellings',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/<product_id:[\w-\.]+>/productDetail' => '/web/product/productDetail',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/allProducts' => '/web/product/allproducts',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/viewCart' => '/web/product/viewcart',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/paymentmethod' => '/web/product/paymentmethod',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/customerHistory' => '/web/user/customerHistory',
        
        /** Product detail **/
        
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/login' => '/web/site/login',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/login' => '/site/login',
        
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
);
?>
