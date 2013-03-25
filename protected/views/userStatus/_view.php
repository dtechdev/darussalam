<?php
/* @var $this UserStatusController */
/* @var $data UserStatus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->status_id), array('view', 'id'=>$data->status_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_title')); ?>:</b>
	<?php echo CHtml::encode($data->status_title); ?>
	<br />


</div>