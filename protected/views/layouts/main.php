<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/custom-style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/gumby.css" />
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sign_in2.js"></script>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msdropdown/dd.css" />

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msdropdown/flags.css" />
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sign_in.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/media/js/dtech.js"></script>
        <title>Darussalam</title>
        <script>
            var yii_base_url = "<?php echo Yii::app()->baseUrl; ?>";
        </script>
    </head>
    <body>
        <div id="loading" align="center" style="display: none;"> Please Wait </div>
        <header>
            <div id="main_header">
                <div class="pretty navbar" gumby-fixed="top" id="nav3">
                    <nav class="row">
                        <a class="toggle" gumby-trigger="#nav3 > .row > ul" href="#"><i class="icon-menu"></i></a>
                        <ul class="eight columns">
                            <?php
                            echo CHtml::openTag('li');
                            echo CHtml::link('BOOKS', $this->createUrl('/web/product/allproducts', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
                            echo CHtml::closeTag('li');
                            echo CHtml::openTag('li');
                            echo CHtml::link('QURAN', $this->createUrl('/web/product/allproducts', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
                            echo CHtml::closeTag('li');
                            echo CHtml::openTag('li');
                            echo CHtml::link('EDUCATIONAL TOYS', $this->createUrl('/web/product/allproducts', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
                            echo CHtml::closeTag('li');
                            echo CHtml::openTag('li');
                            echo CHtml::link('OTHERS', $this->createUrl('/web/product/allproducts', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
                            echo CHtml::openTag('li');
                            ?>
                        </ul>
                    </nav>
                </div>
                <div id="world">
                    <div id="input">

                        <?php
                        echo CHtml::form();
                        $model = new Country();
                        $login_model = new LoginForm;
                        //print "<pre>";
                        $countries = Country::model()->findAll('site_id=' . Yii::app()->session['site_id']);
                        // print_r($countries);
                        // exit;
                        if ($countries != null) {
                            foreach ($countries as $country) {
                                foreach ($country->cities as $city) {
                                    $countryList[] = array('city_id' => $city->city_id, 'city_name' => $city->city_name, 'country_name' => $country->country_name);
                                }
                            }
                        }


                        $countriesList = CHtml::listData($countryList, 'city_id', 'city_name', 'country_name');
                        echo CHtml::dropDownList('city_id', '', $countriesList, array(
                            'options' => array(Yii::app()->session['city_id'] => array('selected' => true)),
                            'ajax' => array(
                                'type' => 'POST',
                                'dataType' => 'json',
                                'data' => array('city_id' => 'js:$(\'#city_id\').val()'),
                                'url' => $this->createUrl('/site/storechange'),
                                'success' => 'function(data) {
                                                            window.location.href=data.redirect
                                                           }',
                            ),
                                ), $htmlOptions = array('id' => 'countries', 'style' => 'width:500px;')
                        );
                        echo CHtml::endForm();
                        ?>
                        <script>
                            $(document).ready(function() {
                                if ($("#countries") != null) {
                                    $("#countries").msDropdown();
                                }
                            })
                        </script>
                    </div>
                </div>
                <div class="right_middle">
                    <div id="right_header_part">
                        <a href="<?php echo $this->createUrl('/web/product/viewwishlist'); ?>">
                            <?php
                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/heart_img_03.jpg', "heart img", array("class" => "heart_img"));
                            ?>
                        </a>
                        <p id="wishlist_counter" style="margin-left: 0px;">
                            <?
                            $ip = Yii::app()->request->getUserHostAddress();
                            if (isset(Yii::app()->user->id)) {
                                $tot = Yii::app()->db->createCommand()
                                        ->select('count(*) as total_pro')
                                        ->from('wish_list')
                                        ->where('city_id=' . Yii::app()->session['city_id'] . ' AND user_id=' . Yii::app()->user->id)
                                        ->queryRow();
                            } else {
                                $tot = Yii::app()->db->createCommand()
                                        ->select('count(*) as total_pro')
                                        ->from('wish_list')
                                        ->where('city_id=' . Yii::app()->session['city_id'] . ' AND session_id="' . $ip . '"')
                                        ->queryRow();
                            }
                            echo ($tot['total_pro'] > 0) ? $tot['total_pro'] : "";
                            ?>

                        </p>
                        <a href="<?php echo $this->createUrl('/web/product/viewcart', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])) ?>">
                            <?php
                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/simple_cart_img_03.jpg', "cart img", array("class" => "cart_img"));
                            ?>
                        </a>
                        <p id="cart_counter">
                            <?php
                            //count total added products in cart
                            if (isset(Yii::app()->user->id)) {
                                $tot = Yii::app()->db->createCommand()
                                        ->select('sum(quantity) as cart_total')
                                        ->from('cart')
                                        ->where('city_id=' . Yii::app()->session['city_id'] . ' AND user_id=' . Yii::app()->user->id)
                                        ->queryRow();
                            } else {
                                $tot = Yii::app()->db->createCommand()
                                        ->select('sum(quantity) as cart_total')
                                        ->from('cart')
                                        ->where('city_id=' . Yii::app()->session['city_id'] . ' AND session_id="' . $ip . '"')
                                        ->queryRow();
                            }
                            echo $tot['cart_total'];
                            ?>

                        </p>
                    </div>
                    <div id="text">
                        <?php if (!Yii::app()->user->isGuest) {
                            ?>
                            <h1><a href="<?php echo $this->createUrl('/site/logout') ?>" class="button" style="margin-top: -7px;">Logout</a>
                                <?php
                            } else {
                                ?>
                                <div class="example2">
                                    <?php
                                    /* @var $this SiteController */
                                    /* @var $model LoginForm */
                                    /* @var $form CActiveForm  */

                                    $this->pageTitle = Yii::app()->name . ' - Login';
                                    $this->breadcrumbs = array(
                                        'Login',
                                    );
                                    ?>
                                    <?php
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'login-form',
                                        'action' => Yii::app()->createUrl('/site/login'),
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?>


                                    <h1>Sign In</h1>
                                    <p>
                                        <?php
                                        echo $login_model->getAttributeLabel('username');
                                        ?>
                                    </p>
                                    <?php echo $form->textField($login_model, 'username', $htmlOptions = array("class" => "second")); ?>
                                    <?php //echo $form->error($login_model,'username');  ?>
                                    <p>
                                        <?php
                                        echo $login_model->getAttributeLabel('password');
                                        ?>
                                    </p>
                                    <?php echo $form->passwordField($login_model, 'password', $htmlOptions = array("class" => "second")); ?>
                                    <?php echo $form->checkBox($login_model, 'rememberMe', $htmlOptions = array("class" => "check")); ?>
                                    <span><?php
                                        echo $login_model->getAttributeLabel('rememberMe');
                                        ?>
                                    </span>
                                    <a href="<?php echo $this->createUrl('/web/user/forgot') ?>" class="forgot"> Forgot Password</a>
                                    <div class="sign_in_button">
                                        <?php echo CHtml::submitButton("Sign In", array("class" => "btn")); ?>
                                    </div>
                                    <h2 class="signinp">Sign in with</h2>
                                    <div class="sign_in">
                                        <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/facebook'); ?>">
                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/facebook_img_03.jpg');
                                            ?>
                                        </a>
                                        <?php echo CHtml::button('Facebook', array("class" => "f_img")); ?>
                                    </div>
                                    <div class="sign_in">
                                        <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/linkedin'); ?>">
                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/linkedin_img_03.jpg');
                                            ?>
                                        </a>
                                        <?php echo CHtml::button('Linkedin', array("class" => "l_img")); ?>
                                    </div>
                                    <div class="sign_in">
                                        <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/twitter'); ?>">
                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/twitter_img_03.jpg');
                                            ?>
                                        </a>
                                        <?php echo CHtml::button('Twitter', array("class" => "t_img")); ?>
                                    </div>
                                    <div class="sign_in">
                                        <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/google'); ?>">
                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/google_img_03.jpg');
                                            ?>
                                        </a>
                                        <?php echo CHtml::button('Google', array("class" => "g_img")); ?>
                                    </div>
                                    <h3 class="dont">Don't have account?</h3>
                                    <div class="sign_up_button">
                                        <a href="<?php echo $this->createUrl('/web/user/register') ?>">
                                            <?php echo CHtml::button('Sign Up', array("class" => "btn")); ?>
                                        </a>
                                    </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php echo $content; ?> 
    <footer>
        <div id="under_footer">
            <div id="left_footer">
                <h1>Connect to DARUSSALAM</h1>
                <?php $this->widget('LoginWidget'); ?>
                <div id="left_under_footer">
                    <li>
                        <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/phone_img_03.jpg', 'phone'); ?>
                        +(92) 42 35254654 - 54
                    </li>
                    <li>
                        <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/gmail_img_03.jpg', 'phone'); ?>
                        support@darussalam.com
                    </li>
                    <li>
                        <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/home_img_03.jpg', 'phone'); ?>
                        Darussalam Publishers
                    </li>
                </div>
               	<p>is a multilingual international Islamic publishing house, with headquarters in Riyadh, Kingdom of Saudi Arabia.</p>
            </div>
            <div id="middle_footer">
                <h1>Navigation</h1>
                <?php
                echo CHtml::openTag("article");
                echo CHtml::link('Darussalam Blog', Yii::app()->createUrl('/?r=blog'), array("target" => "_blank"));
                echo CHtml::closeTag("article");
                $pages = Pages::model()->getPages();
                foreach ($pages as $page) {
                    echo CHtml::openTag("article");
                    echo CHtml::link($page->title, Yii::app()->createUrl('/web/page/viewPage/', array("id" => $page->id)));
                    echo CHtml::closeTag("article");
                }
                ?>
            </div>
            <div id="right_footer">
                <h1>What's New?</h1>
                <p><article>D-Tech - Working on technologies</article></p>
                <article><i>iPhone, Android & iPad Islamic apps</i></article>
                <p><article>D-Tech - Working on technologies</article></p>
                <article><i>iPhone, Android & iPad Islamic apps</i></article>
                <section>&copy; 2013 Darussalam, Inc. All Rights Reserved.</section>
            </div>
       	</div>
    </footer>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/msdropdown/jquery.dd.min.js"></script>
</body>
</html>
