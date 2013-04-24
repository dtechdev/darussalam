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
        'web/<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>' => '/site/storehome',
        'web/<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/featuredProducts' => '/web/product/featuredProducts',
        'web/<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/bestSellings' => '/web/product/bestSellings',
        'web/<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/<product_id:[\w-\.]+>/productDetail' => '/web/product/productDetail',
        'web/<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/allProducts' => '/web/product/allproducts',
        'web/<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/viewCart' => '/web/product/viewcart',
        
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
);
?>
