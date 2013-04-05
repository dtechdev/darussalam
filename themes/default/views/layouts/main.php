<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" media="screen, projection" />
<title>Darussalam</title>
</head>

<body>
	<header>
    	<div id="main_header">
        	<nav>
            	<ul>
                	<li><a href="#">BOOKS</a></li>
                    <li><a href="#">QURAN</a></li>
                    <li><a href="#">EDUCATIONAL TOYS</a></li>
                    <li><a href="#">OTHERS</a></li>
                </ul>
            </nav>
            <div id="world">
            	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/world_img_03.jpg" alt="world img" />
                <span><a href="#">United States</a> - <a href="#">English</a></span>
                <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/world_arrow_img_03.jpg" alt="arrow img" /></a>
            </div>
            <div id="right_header_part">
            	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/heart_img_03.jpg" alt="heart img" class="heart_img" /></a>
                <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/simple_cart_img_03.jpg" alt="cart img" class="cart_img" /></a>
            </div>
            <div id="text">
            	<h1><a href="#">Sign In</a>
                    <div class="under_text">
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
                        ),));  $model=new LoginForm; ?>
                        
                        <ul>
                            <li class="frst">Sign In</li>
                            <li class="second"><?php echo $form->textField($model,'username'); ?></li>
                            <li class="second"><?php echo $form->passwordField($model,'password'); ?></li>
                            <li class="check"><?php echo $form->checkBox($model,'rememberMe'); ?>Keep me Sign in.</li>
                            <li class="second"><?php echo CHtml::submitButton('Sign In'); ?></li>
                            <li class="second"><a href="<?php echo $this->createUrl('/user/register')?>">Register a new account</a></li>
                            <li class="second"><a href="<?php echo $this->createUrl('/user/forgot')?>">Forgeot User ID or Password?.</a></li>
                     	</ul>
                        <?php $this->endWidget();?>
                         <?php // $this->widget('LoginWidget');?>
                    </div>
                </h1>
            </div>
        </div>
    </header>
    <div id="banner">
     	<div id="main_banner">
        	<div id="left_banner">
                <a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/darussalam-inner-logo.png" alt="logo" /></a>
                <nav>
                    <ul>
                        <li><a href="<?php echo $this->createUrl('/site/page',array('view'=>'about'))?>" >About Us</a></li>
                        <li><a href="<?php echo $this->createUrl('/site/contact')?>">Contact us</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </nav>
                <div class="txt">
                	<div class="search_img">
                    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/search_img_03.jpg" alt="search img" /></a>
                   	</div>
                	<input type="text" name="" value="" class="txt_bar" />
                	<input type="button" value="Search" name="" class="txt_btn" />
              	</div>
          	</div>
             <div id="right_banner">
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_1_03.jpg" alt="scientific book" />
                   	</div>
                    <div class="small_book_content">
                        <p><a href="#">Talha Jutt </a>recommended this book</p>
                        <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                        <p class="minutes">about 2 seconds ago</p>
                   	</div>
                </div>
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_2_03.jpg" alt="scientific book" />
                   	</div>
                    <div class="small_book_content">
                        <p><a href="#">Zain Khan </a>recommended this book</p>
                        <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                        <p>about 2 seconds ago</p>
                        <p class="blak">Sunt in culpa quie officia deserunt molit anim id est laborum sind occaecat.</p>
                  	</div>
                </div>
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_3_03.jpg" alt="scientific book" />
                  	</div>
                    <div class="small_book_content">
                        <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                        <p>7,165 people recommended this book</p>
                   	</div>
                </div>
                <div class="small_book">
                	<div class="small_book_img">
                		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_book_1_03.jpg" alt="scientific book" />
                  	</div>
                    <div class="small_book_content">
                        <p><a href="#">Talha Jutt </a>recommended this book</p>
                        <p><a href="#" class="science">Scientific Wonders on the earth and in space</a></p>
                        <p class="minutes">about 2 seconds ago</p>
                  	</div>
                </div>
            </div>
       	</div>
    </div>
    <div id="content">
    	<div id="main_content">
        	<div id="left_content">
            	<h1>Over 1500 books for every type</h1>
            </div>
            <div id="right_content">
            	<ul>
                	<li><a href="#">Careers</a></li>
                    <li><a href="#">Becomes Our Partner</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section>
    	<div id="main_section">
          	<h1>BROWSE BY CATEGORY</h1>
            <div class="browse">
                <div class="section_list">
                    <ul>
                        <li><a href="#">Aqeedah</a></li>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Biography of the Prophet</a></li>
                        <li><a href="#">Children</a></li>
                        <li><a href="#">Fatawa</a></li>
                        <li><a href="#">Fiqh</a></li>
                    </ul>
                </div>
                
                <div class="section_list">
                    <ul>
                        <li><a href="#">General</a></li>
                        <li><a href="#">Hadith</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Islamic Culture</a></li>
                        <li><a href="#">Non-Muslim</a></li>
                        <li><a href="#">Worship</a></li>
                    </ul>
                </div>
                <div class="section_list">
                    <ul>
                        <li><a href="#">Packet or Set</a></li>
                        <li><a href="#">Qur'an</a></li>
                        <li><a href="#">Stories</a></li>
                        <li><a href="#">Supplication and Forgiveness</a></li>
                        <li><a href="#">Tafsir</a></li>
                        <li><a href="#">Women</a></li>
                    </ul>
                </div>
                <div class="section_list">
                    <ul>
                        <li><a href="#">Aqeedah</a></li>
                        <li><a href="#">Biography</a></li>
                        <li><a href="#">Biography of the Prophet</a></li>
                        <li><a href="#">Children</a></li>
                        <li><a href="#">Fatawa</a></li>
                        <li><a href="#">Fiqh</a></li>
                    </ul>
                </div>
                <div class="section_list">
                    <ul>
                        <li><a href="#">General</a></li>
                        <li><a href="#">Hadith</a></li>
                        <li><a href="#">History</a></li>
                        <li><a href="#">Islamic Culture</a></li>
                        <li><a href="#">Non-Muslim</a></li>
                        <li><a href="#">Worship</a></li>
                    </ul>
                </div>
          	</div>
          <?php echo $content; ?>
        </div>
    </section>
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
