<?php
/* @var $this CatagoriesController */
/* @var $data Catagories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('catagory_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->catagory_id), array('view', 'id'=>$data->catagory_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catagory_name')); ?>:</b>
	<?php echo CHtml::encode($data->catagory_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_date')); ?>:</b>
	<?php echo CHtml::encode($data->added_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />


</div>