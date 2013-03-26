<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'prouduct_name'); ?>
		<?php echo $form->textField($model,'prouduct_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'prouduct_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profile_id'); ?>
		<?php echo $form->textField($model,'profile_id'); ?>
		<?php echo $form->error($model,'profile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->textField($model,'city_id'); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_date'); ?>
		<?php echo $form->textField($model,'added_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'added_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_featured'); ?>
		<?php echo $form->textField($model,'is_featured',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'is_featured'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_price'); ?>
		<?php echo $form->textField($model,'product_price',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'product_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount_id'); ?>
		<?php echo $form->textField($model,'discount_id'); ?>
		<?php echo $form->error($model,'discount_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->