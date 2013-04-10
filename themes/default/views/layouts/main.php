<!DOCTYPE html>
<html>
<head>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/gumby.css">
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/modernizr-2.6.2.min.js"></script>
<title>Darussalam</title>
<script>window.jQuery || document.write('<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/jquery-1.8.3.min.js"><\/script>')</script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/libs/gumby.min.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/plugins.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
  <script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>
<script src="http://www.marghoobsuleman.com/misc/jquery.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msdropdown/dd.css" />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/msdropdown/jquery.dd.min.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msdropdown/flags.css" />
  
</head>

<body>
	<header>
    	<div id="main_header">
        	<div class="pretty navbar" gumby-fixed="top" id="nav3">
                <nav class="row">
                    <a class="toggle" gumby-trigger="#nav3 > .row > ul" href="#"><i class="icon-menu"></i></a>
                    <ul class="eight columns">
                        <li><a href="#">BOOKS</a></li>
                        <li><a href="#">QURAN</a></li>
                        <li><a href="#">EDUCATIONAL TOYS</a></li>
                        <li><a href="#">OTHERS</a></li>
                    </ul>
                </nav>
          	</div>
            <div id="world">
            	<div id="input">
                    
                    <?php
                    echo CHtml::form();
                    $model=new Country();
                    //print "<pre>";
                    $countries = Country::model()->findAll();
                   // print_r($countries);
                   // exit;
                if ($countries != null) {
                    foreach ($countries as $country) {
                        foreach($country->cities as $city)
                        {
                            $countryList[]=array('city_id'=>$city->city_id,'city_name'=>$city->city_name,'country_name'=>$country->country_name);
                        }
                    }
                }
                $countriesList = CHtml::listData($countryList,'city_id','city_name','country_name');
                echo CHtml::dropDownList('city_id', '',$countriesList,
                        array(
                            'ajax'=>array(
                                'type'=>'POST',
                                'dataType'=>'json',
                                'data'=>array('city_id'=>'js:$(\'#city_id\').val()'),
                                'url'=>  CController::createUrl('/site/DdlAjax'),
                                'success'=>'function(data) {
                                                            window.location.href=data.redirect
                                                           }',
                            ),
                            
                        ),
                        array('id'=>'countries','style'=>'width:200px;'));
                echo CHtml::endForm();
                    ?>
<!--            	<select name="countries" id="countries" style="width:200px;">
                      <option value='af' data-image="<?php echo Yii::app()->theme->baseUrl; ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag af" data-title="Afghanistan" selected="selected">Afghanistan - Pashto</option>
                       </select>-->
				<script>
                $(document).ready(function() {
                    $("#countries").msDropdown();
                })
                </script>
            	</div>
            </div>
            <div class="right_middle">
                <div id="right_header_part">
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/heart_img_03.jpg" alt="heart img" class="heart_img" /></a>
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/simple_cart_img_03.jpg" alt="cart img" class="cart_img" /></a>
                </div>
                <div id="text">
                          <?php
                        /* @var $this SiteController */
                        /* @var $model LoginForm */
                        /* @var $form CActiveForm  */

                        $this->pageTitle=Yii::app()->name . ' - Login';
                        $this->breadcrumbs=array(
                                'Login',
                        );
                        ?>
                        <?php $form=$this->beginWidget('CActiveForm', array(
                         'id'=>'login-form',
                        'enableClientValidation'=>true,
                        'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                        ),)); 
                        $model=new LoginForm; ?>
                    <?php if(!Yii::app()->user->isGuest){?>
            	<h1><a href="<?php echo $this->createUrl('/site/logout')?>">Logout</a>
                    <?php }else{?>
            	<h1><a href="#">Sign In</a>
                        <div class="under_text">
                            <ul>
                                <li class="frst">Sign In</li>
                                <p class="mail">EMAIL</p>
                                <li><?php echo $form->textField($model,'username',$htmlOptions=array("class"=>"second")); ?></li>
                                <li><?php echo $form->error($model,'username'); ?></li>
                                <p class="pswrd">PASSWORD</p>
                                <li><?php echo $form->passwordField($model,'password',$htmlOptions=array ("class"=>"second")); ?></li>
                               <?php echo $form->error($model,'password'); ?>
                                <li class="check"><?php echo $form->checkBox($model,'rememberMe'); ?>Stay Signed in</li>
                                <li class="forgot"><a href="<?php echo $this->createUrl('/user/forgot')?>">Forgot Password</a></li>
                            </ul>
                            <?php echo CHtml::submitButton("Sign In",array("class"=> "btn")); ?>
                            <p class="signinp">Sign in with</p>
                            <div class="sign_in">
                                <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/facebook');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/facebook_img_03.jpg">
                                <input type="button" class="f_img" value="Facebook" /></a>
                            </div>
                            <div class="sign_in">
                                <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/linkedin');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/linkedin_img_03.jpg">
                                <input type="button" class="l_img" value="Linkedin" /></a>
                            </div>
                            <div class="sign_in">
                                <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/twitter');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter_img_03.jpg">
                                <input type="button" class="t_img" value="Twitter" /></a>
                            </div>
                            <div class="sign_in">
                                <a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/google');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/google_img_03.jpg">
                                <input type="button" class="g_img" value="Google" /></a>
                            </div>
                            <p class="dont"><a href="<?php echo $this->createUrl('/user/register')?>">Don't have account?</a></p>
                      
                            <a href="<?php echo $this->createUrl('/user/register')?>"><input type="button" value="Sign Up" class="btn" /></a>
                        </div>
                    <?php } $this->endWidget();?> </h1>
                </div>
          	</div>
        </div>
    </header>
<?php echo $content; ?>
    <footer>
    	<div id="under_footer">
       		<div id="left_footer">
            	<h1>Connect to DARUSSALAM</h1>
                <?php  $this->widget('LoginWidget');?>
                <div id="left_under_footer">
                	<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/phone_img_03.jpg" alt="phone"> +(92) 42 35254654 - 54</li>
                    <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/gmail_img_03.jpg" alt="phone"><a href="#"> support@darussalam.com</a></li>
                    <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home_img_03.jpg" alt="phone"> Darussalam Publishers</li>
                </div>
               	<p>is a multilingual international Islamic publishing house, with headquarters in Riyadh, Kingdom of Saudi Arabia.</p>
            </div>
            <div id="middle_footer">
            	<h1>Navigation</h1>
                <article><a href="#">About Us</a></article>
                <article><a href="#">Contact Us</a></article>
                <article><a href="#">Careers</a></article>
                <article><a href="#">FAQ's</a></article>
                <article><a href="#">Terms &amp; Conditions</a></article>
                <article><a href="#">Shipping Rates & Policies</a></article>
            </div>
            <div id="right_footer">
            	<h1>What's New?</h1>
                <p><a href="#">D-Tech - Working on technologies</a></p>
                <article><i>iPhone, Android & iPad Islamic apps</i></article>
                <p><a href="#">D-Tech - Working on technologies</a></p>
                <article><i>iPhone, Android & iPad Islamic apps</i></article>
                <section>&copy; 2013 Darussalam, Inc. All Rights Reserved.</section>
            </div>
       	</div>
  	</footer>
</body>
</html>
