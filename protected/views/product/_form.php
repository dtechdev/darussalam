<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js');
?>

<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
        <?php echo $form->labelEx($model, 'discount_type'); ?>
        <?php echo $form->dropDownList($model, 'discount_type', array('fixed' => 'Fixed', 'percentage' => 'Percentage'), array('prompt' => 'Select Discount Type', 'size' => 1, 'maxlength' => 1)); ?>
        <?php echo $form->error($model, 'discount_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'discount_value'); ?>
        <?php echo $form->textField($model, 'discount_value', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'discount_value'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'isbn'); ?>
        <?php echo $form->textField($model, 'isbn', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'isbn'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'authors'); ?>
        <?php echo $form->dropDownList($model, 'authors', $authorList, array('prompt' => 'Select Author')); ?>
        <?php echo $form->error($model, 'authors'); ?>
    </div>

    <?php
    if ($this->action->id != "update") {
        $this->renderPartial('productImages/_container', array('model' => $model, "type" => "field"));
    }
    ?>


    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->