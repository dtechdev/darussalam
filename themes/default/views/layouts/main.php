<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/gumby.css" />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sign_in2.js"></script>
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msdropdown/dd.css" />

<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/msdropdown/flags.css" />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sign_in.js"></script>
<title>Darussalam</title>
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
                            'options'=>array(Yii::app()->session['city_id']=>array('selected'=>true)),
                            'ajax'=>array(
                                'type'=>'POST',
                                'dataType'=>'json',
                                'data'=>array('city_id'=>'js:$(\'#city_id\').val()'),
                                'url'=>  CController::createUrl('/site/DdlAjax'),
                                'success'=>'function(data) {
                                                            window.location.href=data.redirect
                                                           }',
                            ),
                           
                            
                        ),$htmlOptions=array('id'=>'countries','style'=>'width:500px;')
                        );
                echo CHtml::endForm();
                    ?>
<!--            	<select name="countries" id="countries" style="width:200px;">
                      <option value='af' data-image="<?php //echo Yii::app()->theme->baseUrl; ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag af" data-title="Afghanistan" selected="selected">Afghanistan - Pashto</option>
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
                	<div class="example2">
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
            	<h1>Sign In</h1>
                       	<p>EMAIL</p>
                        <?php echo $form->textField($model,'username',$htmlOptions=array("class"=>"second")); ?>
                       	<p>PASSWORD</p>
                        <?php echo $form->passwordField($model,'password',$htmlOptions=array ("class"=>"second")); ?>
                      	<?php echo $form->checkBox($model,'rememberMe',$htmlOptions=array ("class"=>"check")); ?><span> Stay Signed in</span>
                        <a href="<?php echo $this->createUrl('/user/forgot')?>" class="forgot"> Forgot Password</a>
                        <div class="sign_in_button">
                      		<?php echo CHtml::submitButton("Sign In",array("class"=> "btn")); ?>
                      	</div>
                  		<h2 class="signinp">Sign in with</h2>
                      	<div class="sign_in">
                      		<a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/facebook');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/facebook_img_03.jpg"></a>
                        	<input type="button" class="f_img" value="Facebook" />
                   		</div>
                      	<div class="sign_in">
                          	<a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/linkedin');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/linkedin_img_03.jpg"></a>
                           	<input type="button" class="l_img" value="Linkedin" />
                      	</div>
                     	<div class="sign_in">
                         	<a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/twitter');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/twitter_img_03.jpg"></a>
                        	<input type="button" class="t_img" value="Twitter" />
                    	</div>
                     	<div class="sign_in">
                          	<a href="<?php echo $this->createUrl('/yiiauth/default/authenticatewith/provider/google');?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/google_img_03.jpg"></a>
                         	<input type="button" class="g_img" value="Google" />
                      	</div>
                          	<h3 class="dont">Don't have account?</h3>
                           	<div class="sign_up_button">
                      			<a href="<?php echo $this->createUrl('/user/register')?>"><input type="button" value="Sign In" class="btn" /></a>
                      		</div>
                      	</div>
                 	</div>
                </div>
          	</div>
        </div>
    </header>
<?php echo $content; ?> <?php } $this->endWidget();?>
     <footer>
    	<div id="under_footer">
       		<div id="left_footer">
            	<h1>Connect to DARUSSALAM</h1>
               <?php  $this->widget('LoginWidget');?>s
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
      <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/msdropdown/jquery.dd.min.js"></script>
</body>
</html>