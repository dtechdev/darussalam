<!DOCTYPE html>
<html>
    <head>
        <title>Darussalam</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/login.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.btnToggle').click(function() {
                    $('#dvText').slideToggle(300);
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
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pak_flag_img_03.png" />
                        <span>Change Country</span>
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/pak_down_arrow_img_03.png" /></a>
                </div>
                <div id="right_header">
                    <span><a href="#">Sign Up</a></span>
                    <span><a href="#">Log In</a></span>
                    <span><a href="#">Contact Us</a></span>
                    <span><a href="#">Blog</a></span>
                </div>
            </header>
            <?php echo $content; ?>