<!DOCTYPE html>
<html>
    <head>
        <title>Darussalam</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style_special.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/login style.css" />
       
        <script src="<?php echo Yii::app()->theme->baseUrl ?>/js/login.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/media/js/dtech.js"></script>    
       
        <script type="text/javascript">
            $(document).ready(function() {
                $('.btnToggle').click(function() {
                    $('#dvText').slideToggle(300);
                    //		  $("#dvText").slideToggle("slow", {direction: "left"}, 300);

                    /*
                     
                     if ($("#dvText").is(":hidden")) {
                     $('#dvText').slideDown();
                     } else {
                     $("#dvText").slideUp();
                     }
                     */

                    return false;
                });
            });
        </script>
    </head>


    <body>
        <div id="wraper">
            <header>
                <div id="left_header">
                    <a href="#">
                        <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/pak_flag_img_03.png" />
                        <span>Change Country</span>
                        <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/pak_down_arrow_img_03.png" /></a>
                </div>
                <div id="right_header">
                    <span><a href="#">Sign Up</a></span>
                    <span>
                        <div id="loginContainer">
                            <?php
                            if (!Yii::app()->user->isGuest) {
                                echo CHtml::link('Logout', $this->createUrl('/site/logout'));
                                ?>
                            <?php } else {
                                ?>
                                <a href="#" id="loginButton">
                                    <span>
                                        Login 
                                    </span>
                                </a>
                                <div style="clear:both"></div>
                                <div id="loginBox">  
                                    <?php
                                    $login_model = new LoginForm;
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'loginForm',
                                        'action' => Yii::app()->createUrl('/site/login'),
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?> 
                                    <fieldset id="body">
                                        <fieldset>
                                            <label for="email">User Name</label>
                                            <?php
                                            echo $form->textField($login_model, 'username', array("id" => "email"));
                                            ?>
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Password</label>
                                            <?php
                                            echo $form->passwordField($login_model, 'password', array("id" => "password"));
                                            ?>
                                        </fieldset>
                                    </fieldset>
                                    <?php echo CHtml::submitButton("User Login", array("class" => "user_login_btn")); ?>
                                    <?php $this->endWidget(); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </span>
                    <span>
                        <?php
                        echo CHtml::link('Contact Us', $this->createUrl('/site/contact'));
                        ?>
                    </span>
                    <span>
                        <?php echo CHtml::link('Blog', Yii::app()->createUrl('/?r=blog'), array("target" => "_blank")); ?>
                    </span>
                </div>
            </header>
            <?php echo $content; ?>
        </div>
        <script>
            // 2010-03-10, 2010-10-23
            // change the position of a “div#x0648e” element.

            var posY = 300; // verticle position from the top of the page
            var chasingFactor = .05; // the closing-in factor to desired position per update
            var updateFrequency = 50; //milisecond
            var idleCheckFrequency = 1 * 1000; //milisecond

            var yMoveTo = 0;
            var ydiff = 0;

            var g = document.getElementById("x0648e");
            g.style.position = "absolute";
            g.style.zIndex = "2";
            g.style.top = "34%";
            g.style.left = "1ex";
            g.style.fontSize = "7ex";
            g.style.color = "red";

            function ff() {
                // compute the distance user has scrolled the window
                if (navigator.appName == "Microsoft Internet Explorer") {
                    ydiff = yMoveTo - document.documentElement.scrollTop;
                } else {
                    ydiff = yMoveTo - window.pageYOffset;
                }
                if (Math.abs(ydiff) > 9) {
                    yMoveTo -= Math.round(ydiff * chasingFactor);
                    g.style.top = (yMoveTo + posY).toString() + "px";
                    setTimeout("ff()", updateFrequency);
                } else {
                    setTimeout("ff()", idleCheckFrequency);
                }
            }

            window.onload = ff;
        </script>
    </body>
</html>

