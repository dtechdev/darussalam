<div id="book_content">
    <div id="book_main_content">
        <div class="left_book_main_content">
            <?php
            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/darussalam-inner-logo.png"), $this->createUrl('/site/storehome', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])));
            ?>
        </div>
        <div class="search_box">
            <input type="text" placeholder="Search keywords or image ids..." value="" class="search_text" />
            <input type="button" name="" value="" class="search_btn" />
            <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/searching_img_03.jpg", '', array('class' => 'searching_img')) ?>
        </div>
        <nav>
            <ul>
                <?php
                echo CHtml::openTag("li");
                $require_pages = array("About Us", "Help");
                foreach ($this->webPages as $page) {
                    if (in_array($page->title, $require_pages)) {
                        echo CHtml::link($page->title, Yii::app()->createUrl('/web/page/viewPage/', array("id" => $page->id)));
                    }
                }
                echo CHtml::link('Contact Us', $this->createUrl('/site/contact'));
                echo CHtml::closeTag("li");
                ?>
            </ul>
        </nav>
    </div>
</div>
<div id="user_login">
    <div id="main_user_login">
        <div class="right_user_login">
            <h2>Forgot Password:</h2>
            <table>
                <tr>
                    <td>
                        <table>
                            <?php
                            $login_model = new LoginForm;
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'login-form',
                                //'action' => Yii::app()->createUrl('/web/user/forgot'),
                                'enableClientValidation' => true,
                                'clientOptions' => array(
                                    'validateOnSubmit' => true,
                                ),
                            ));
                            ?>
                            <tr>
                                <td class="left_login"></td>
                                <td class="right_login" style="color: green" >
                                    <?php
                                    if (Yii::app()->user->hasFlash('incorrect_email') || Yii::app()->user->hasFlash('password_reset') || Yii::app()->user->hasFlash('superAdmin')) {
                                        ?>
                                        <div class="flash-success" align="center">
                                            <?php echo Yii::app()->user->getFlash('incorrect_email'); ?>
                                            <?php echo Yii::app()->user->getFlash('password_reset'); ?>
                                            <?php echo Yii::app()->user->getFlash('superAdmin'); ?>
                                        </div>

                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="left_login">Email Address</td>
                                <td class="right_login">
                                    <?php echo $form->textField($model, 'user_email', array("class" => "login_text")); ?>
                                </td>
                            </tr>

                            <tr>
                                <td class="left_login"></td>
                                <td class="right_login">
                                    <?php echo CHtml::submitButton("Send", array("class" => "already_account")); ?>
                                </td>
                            </tr>
                            <?php $this->endWidget(); ?>
                        </table>
                    </td>
                </tr>
            </table>
            <h2>Sign in with</h2>
            <div id="login_images">
                <div class="login_img">
                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/facebook_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "facebook")));
                    ?>
                    <span>Facebook</span>
                </div>
                <div class="login_img">
                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/linkedin_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "linkedin")));
                    ?>
                    <span>Linkedin</span>
                </div>
                <div class="login_img">
                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/twitter_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "twitter")));
                    ?>
                    <span>Twitter</span>
                </div>
                <div class="login_img">
                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/google_img_03.jpg"), $this->createUrl('/web/hybrid/login/', array("provider" => "google")));
                    ?>
                    <span>Google</span>
                </div>
            </div>
        </div>
    </div>
</div>
