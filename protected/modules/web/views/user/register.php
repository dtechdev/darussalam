<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>
<div class="form">
    <div id="shopping_cart" style="height:408px;text-align:center;  ">
        
            
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableClientValidation' => TRUE,
    ));
    ?>
<!--    <p class="note">Fields with <span class="required">*</span> are required.</p>-->
        <h2>User Registration Here...<hr></h2>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">

        <?php echo $form->labelEx($model, 'user_email'); ?>
        <?php echo $form->textField($model, 'user_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_password'); ?>
        <?php echo $form->passwordField($model, 'user_password', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_password2'); ?>
        <?php echo $form->passwordField($model, 'user_password2', array('size' => 60, 'maxlength' => 255)); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Register' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>
                                                  
    </div>

</div><!-- form -->