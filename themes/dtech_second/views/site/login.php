<?php
$this->webPcmWidget['filter'] = array('name' => 'DtechSecondSidebar',
    'attributes' => array(
        'cObj' => $this,
        'cssFile' => Yii::app()->theme->baseUrl . "/css/side_bar.css",
        ));
?>
<div id="login_content">
    <?php
    echo CHtml::image(Yii::app()->theme->baseUrl . "/images/shopping_cart_img_03.png");
    ?>
    <h6>Already a member?</h6>
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
    <div id="errors" style="color: red">
        <?php echo $form->errorSummary($model); ?>
    </div>
    <div class="login_part">
        <p>User Name</p>
        <?php echo $form->textField($model, 'username', array("class" => "text")); ?>
        <p>Password</p>
        <?php echo $form->passwordField($model, 'password', $htmlOptions = array("class" => "text")); ?>
        <article> <?php echo CHtml::link('Forgot password?', $this->createUrl('/web/user/forgot')); ?></article>
        <div id="main_login_pointer">
        </div>
        <?php
        echo $form->hiddenField($model, 'route');
        echo CHtml::submitButton("User Login", array("class" => "user_login_button"));
        ?>
    </div>
    <?php $this->endWidget(); ?>
    <div class="login_with_images">
        <h4>Login with</h4>

        <?php
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/facebook_login_03.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "facebook")));
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/bird_login_03.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "twitter")));
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/google_login_03.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "google")));
        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/in_img_06.png"), $this->createUrl('/web/hybrid/login/', array("provider" => "linkden")));
        ?>
    </div>
</div>