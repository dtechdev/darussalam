<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="form wide">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'categories-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <?php //echo $form->textField($model,'parent_id'); ?>
        <?php echo $form->dropDownList($model, 'parent_id', 
                $categoriesList, array('prompt' => 'Select Parent Category')); ?>
        <?php echo $form->error($model, 'parent_id'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'category_name'); ?>
        <?php echo $form->textField($model, 'category_name', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'category_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'city_id'); ?>
        <?php echo $form->dropDownList($model, 'city_id', $cityList, 
                array('prompt' => 'Select city','onchange'=>'
         dtech.changeAdminCity("'.$this->createUrl($this->route).'",this)
                        ')); ?>
        <?php echo $form->error($model, 'city_id'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class" => "btn")); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->