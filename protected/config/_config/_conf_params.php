<?php

/**
 * @author Ali Abbas
 * @abstract use for 
 *  setting extra param
 *  
 */
$params = array(
    // this is used in contact page
    'adminEmail' => 'zahid.nadeem@darussalampk.com', //Should be same component->email->user, use for sending emails to customer (sign up conformation, sending activation link, sending new password)
    'replyTo' => 'zahid.nadeem@darussalampk.com',
    'cc' => 'zahid.nadeem@darussalampk.com',
    'bcc' => 'zahid.nadeem@darussalampk.com',
    'supportEmail' => 'zahid.nadeem@darussalampk.com', //receiveing customer emails
    
    'email' => array(
        'class' => 'application.extensions.KEmail.KEmail',
        'host_name' => 'smtp.gmail.com',
        'user' => 'zahid.nadeem@darussalampk.com',
        'password' => 'public420',
        'host_port' => 465,
        'ssl' => 'true',
    ),
    'Paypal' => array(
        'class' => 'application.components.Paypal',
        'apiUsername' => 'zahid.nadeem-facilitator_api1.darussalampk.com',
        'apiPassword' => '1366199236',
        'apiSignature' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31AsZ74UA0FGC.aXRCRZeTDD1bRWiS',
        'apiLive' => false,
        'returnUrl' => 'paypal/confirm/', //regardless of url management component
        'cancelUrl' => 'paypal/cancel/', //regardless of url management component
    ),
);
?>
