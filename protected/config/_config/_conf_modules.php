<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting new  module
 *  
 */
$modules = array(
    // uncomment the following to enable the Gii tool
    // uncomment the following to enable the Gii tool

    'web',
    'gii' => array(
        'class' => 'system.gii.GiiModule',
        'password' => '123',
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        'ipFilters' => array('127.0.0.1', '::1'),
    ),
    'yiiauth' => array(
        'userClass' => 'User', //the name of your Userclass
        'config' => array(
            "base_url" => "http://" . $_SERVER['SERVER_NAME'] . "/hybridauth/",
            "providers" => array(
                // openid providers
                "OpenID" => array(
                    "enabled" => true
                ),
                "Yahoo" => array(
                    "enabled" => true
                ),
                "AOL" => array(
                    "enabled" => true
                ),
                "Google" => array(
                    "enabled" => true,
                    "keys" => array("id" => "602525919522-btoe9e878to546igevhc2p2o6qqc0b0f.apps.googleusercontent.com", "secret" => "BZfzZrphAzCOrXH4Cl_g-PdX"),
                    "scope" => ""
                ),
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "439038352850451", "secret" => "4d34e1d86dadaff84100a391ed3b9694"),
                    // A comma-separated list of permissions you want to request from the user. See the Facebook docs for a full list of available permissions: http://developers.facebook.com/docs/reference/api/permissions.
                    "scope" => "",
                    // The display context to show the authentication page. Options are: page, popup, iframe, touch and wap. Read the Facebook docs for more details: http://developers.facebook.com/docs/reference/dialogs#display. Default: page
                    "display" => "page"
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "YsCF0GCKecKfiGhOgZibQ", "secret" => "oBmRCRmqqzFgdw63PwLMwjg9z1wRGoP90V9tWtieQ")
                ),
                // windows live
                "Live" => array(
                    "enabled" => true,
                    "keys" => array("id" => "", "secret" => "")
                ),
                "MySpace" => array(
                    "enabled" => false,
                    "keys" => array("key" => "", "secret" => "")
                ),
                "LinkedIn" => array(
                    "enabled" => true,
                    "keys" => array("key" => "sb3sap31ifdx", "secret" => "B3F5WucKGrkfxgnK")
                ),
                "Foursquare" => array(
                    "enabled" => false,
                    "keys" => array("id" => "", "secret" => "")
                ),
            ),
            // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
            "debug_mode" => false,
            "debug_file" => "",
        ),
    )
);


$conf_component_authManager = array(
    'class' => 'CDbAuthManager', // Provides support authorization item sorting. ...... 
);
?>
