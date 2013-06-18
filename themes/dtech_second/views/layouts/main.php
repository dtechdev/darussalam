<!DOCTYPE html>
<html>
    <head>
        <title>Darussalam</title>
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/popup_style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/footer_style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/login_style.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/msdropdown/dd.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/msdropdown/flags.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl ?>/css/customStyle.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/media/css/overlay.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/dtech_new.js"></script>
        <script src="<?php echo Yii::app()->baseUrl; ?>/media/js/dtech.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl ?>/js/msdropdown/jquery.dd.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                dtech_new.toggleLogin();
                dtech_new.toggleSideBar();
                dtech_new.footerToggle();
                dtech_new.changeBookImgHover();
                dtech_new.registerCountryDropDown();
                jQuery("#countries").msDropdown();
                dtech_new.registerPopUp();

            });
        </script>


    </head>
    <body>
        <div id="wraper">
            <header>
                <div id="left_header">
                    <select name="countries" id="countries" style="width:300px;">
                        <option value='in' data-image="<?php echo Yii::app()->theme->baseUrl ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag in" data-title="India" selected="selected">India</option>
                        <option value='pk' data-image="<?php echo Yii::app()->theme->baseUrl ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag pk" data-title="Pakistan">Pakistan</option>
                        <option value='sa' data-image="<?php echo Yii::app()->theme->baseUrl ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag sa" data-title="Saudi Arabia">Saudi Arabia</option>
                        <option value='uk' data-image="<?php echo Yii::app()->theme->baseUrl ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag uk" data-title="United Kingdom">United Kingdom</option>
                        <option value='us' data-image="<?php echo Yii::app()->theme->baseUrl ?>/images/msdropdown/icons/blank.gif" data-imagecss="flag us" data-title="United States">United States</option>
                    </select>
                </div>
                <div id="right_header">
                    <span><a href="#">Sign Up</a></span>
                    <span>
                        <div id="login_contain">
                            <?php
                            if (!Yii::app()->user->isGuest) {
                                echo $this->renderPartial("//layouts/_logout_box")
                                ?>
                            <?php } else {
                                ?>

                                <a href="#" id="login_btn">
                                    <span>
                                        Login 
                                    </span>
                                </a>
                                <div style="clear:both"></div>
                                <div id="login_bx">  
                                    <?php
                                    $login_model = new LoginForm;
                                    $form = $this->beginWidget('CActiveForm', array(
                                        'id' => 'login_frm',
                                        'action' => Yii::app()->createUrl('/site/login'),
                                        'enableClientValidation' => true,
                                        'clientOptions' => array(
                                            'validateOnSubmit' => true,
                                        ),
                                    ));
                                    ?> 
                                    <fieldset id="body">
                                        <fieldset>
                                            <div id="login_pointer">
                                            </div>
                                            <label for="email">User Name</label>
                                            <?php
                                            echo $form->textField($login_model, 'username', array("id" => "email"));
                                            echo $form->hiddenField($login_model, 'route', array("value" => Yii::app()->request->getUrl()));
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
            <div id="banner">
                <div id="upper_banner">
                    <div class="logo">
                        <?php
                        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/logo_img_03.png", 'Logo'), $this->createDTUrl('/site/index'));
                        ?>
                    </div>
                    <div class="search_with_box">
                        <div id="search-box">

                            <form id="search-form" method="post" 
                                  action="<?php echo $this->createUrl("/web/search/getSearch") ?>" target='_top'>

                                <a href="javascript:void(0)" onclick="dtech.doGloblSearch()" >
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/search_03.png" alt="search img" />
                                </a>

                                <?php
                                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                    'name' => 'serach_field',
                                    'source' => $this->createUrl("/web/search/dosearch"),
                                    // additional javascript options for the autocomplete plugin
                                    'options' => array(
                                        'minLength' => '1',
                                    ),
                                    'htmlOptions' => array(
                                        'id' => 'search-text',
                                        'value' => (isset($_POST['serach_field']) ? $_POST['serach_field'] : ""),
                                        'placeholder' => 'type here',
                                    ),
                                ));
                                ?>
                                <button id='search-button' type='submit' onclick="dtech.doGloblSearch()"><span>Search</span></button>
                            </form>
                        </div>
                    </div>
                    <div class="cart_part">
                        <div class="add_to_cart">
                            <ul>
                                <li>
                                    <?php
                                    $cart = Cart::model()->getCartLists();
                                    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/shopping_cart_03.png"), $this->createUrl("/web/cart/viewcart"));
                                    echo "<div id='cart_control'>";
                                    $this->renderPartial("//cart/_cart", array("cart" => $cart));
                                    echo "</div>";
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="wishlist">
                            <?php
                            $this->renderPartial("//layouts/_wishlist");
                            ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <hr class="style-two">	
                </div>
                <div id="below_banner">
                    <div id="bar">
                        <div id="container">
                            <div id="sideBarContainer">

                                <?php
                                if (isset($this->webPcmWidget['filter'])) {

                                    $this->widget($this->webPcmWidget['filter']['name'], $this->webPcmWidget['filter']['attributes']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="best_seller">
                            <?php
                            if (isset($this->webPcmWidget['best'])) {

                                $this->widget($this->webPcmWidget['best']['name'], $this->webPcmWidget['best']['attributes']);
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            echo $content;
            ?>
    </body>

</html>
