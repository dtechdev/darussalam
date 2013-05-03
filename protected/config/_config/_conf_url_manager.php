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
        /** Product detail * */
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>' => '/site/storehome',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/featuredProducts' => '/web/product/featuredProducts',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/bestSellings' => '/web/product/bestSellings',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/<product_id:[\w-\.]+>/productDetail' => '/web/product/productDetail',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/allProducts' => '/web/product/allproducts',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/viewCart' => '/web/product/viewcart',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/paymentmethod' => '/web/product/paymentmethod',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/customerHistory' => '/web/user/customerHistory',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/productfilter' =>'/web/product/productfilter',
        /** Product detail * */
       
        /** admin url ** */
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/user/index' => '/user/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/userRole/index' => '/userRole/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/country/index' => '/country/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/city/index' => '/city/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/language/index' => '/language/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/selfSite/index' => '/selfSite/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/product/index' => '/product/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/categories/index' => '/categories/index',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/author/index' => '/author/index',
        
        /** admin url ** */
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/user/create' => '/user/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/userRole/create' => '/userRole/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/country/create' => '/country/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/city/create' => '/city/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/language/create' => '/language/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/selfSite/create' => '/selfSite/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/product/create' => '/product/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/categories/create' => '/categories/create',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/author/create' => '/author/create',
        
        
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/user/update/<id:[\w-\.]+>' => '/user/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/userRole/update/<id:[\w-\.]+>' => '/userRole/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/country/update/<id:[\w-\.]+>' => '/country/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/city/update/<id:[\w-\.]+>' => '/city/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/language/update/<id:[\w-\.]+>' => '/language/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/selfSite/update/<id:[\w-\.]+>' => '/selfSite/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/product/update/<id:[\w-\.]+>' => '/product/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/categories/update/<id:[\w-\.]+>' => '/categories/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/author/update/<id:[\w-\.]+>' => '/author/update',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/conf/load/<id:[\w-\.]+>' => '/configurations/load',
        
        
        /** other urls * */
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/login' => '/web/site/login',
        '<country:[\w-\.]+>/<city:[\w-\.]+>/<city_id:[\w-\.]+>/login' => '/site/login',
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    ),
);
?>
