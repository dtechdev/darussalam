<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_name'); ?>
<?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'product_name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'product_description'); ?>
<?php echo $form->textArea($model, 'product_description', array('cols' => 81, 'maxlength' => 255)); ?>
<?php echo $form->error($model, 'product_description'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'is_featured'); ?>
<?php echo $form->dropDownList($model, 'is_featured', array('1' => 'Yes', '0' => 'No'), array('size' => 1, 'maxlength' => 1)); ?>
        <?php echo $form->error($model, 'is_featured'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'city_id'); ?>
        <?php echo $form->dropDownList($model, 'city_id', $cityList, array('prompt' => 'Select city')); ?>
        <?php echo $form->error($model, 'city_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'product_price'); ?>
<?php echo $form->textField($model, 'product_price', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'product_price'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($mProductDiscount, 'discount_type'); ?>
<?php echo $form->dropDownList($mProductDiscount, 'discount_type', array('fixed' => 'Fixed', 'percentage' => 'Percentage'), array('prompt' => 'Select Discount Type','size' => 1, 'maxlength' => 1)); ?>
<?php echo $form->error($mProductDiscount, 'discount_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($mProductDiscount, 'discount_value'); ?>
<?php echo $form->textField($mProductDiscount, 'discount_value', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($mProductDiscount, 'discount_value'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($mProductProfile, 'isbn'); ?>
<?php echo $form->textField($mProductProfile, 'isbn', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($mProductProfile, 'isbn'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($mProductProfile, 'language_id'); ?>
        <?php echo $form->dropDownList($mProductProfile, 'language_id', $languageList, array('prompt' => 'Select Language')); ?>
        <?php echo $form->error($mProductProfile, 'language_id'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($mProductProfile, 'author_id'); ?>
        <?php echo $form->dropDownList($mProductProfile, 'author_id', $authorList, array('prompt' => 'Select Author')); ?>
        <?php echo $form->error($mProductProfile, 'author_id'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($mProductImage, 'image'); ?>
<?php echo CHtml::activeFileField($mProductImage, 'image', array('size' => 60, 'maxlength' => 255)); ?>
<?php echo $form->error($mProductImage, 'image'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->