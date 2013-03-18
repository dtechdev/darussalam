<?php
/* @var $this UserStatusController */
/* @var $model UserStatus */

$this->breadcrumbs=array(
	'User Statuses'=>array('index'),
	$model->status_id,
);

$this->menu=array(
	array('label'=>'List UserStatus', 'url'=>array('index')),
	array('label'=>'Create UserStatus', 'url'=>array('create')),
	array('label'=>'Update UserStatus', 'url'=>array('update', 'id'=>$model->status_id)),
	array('label'=>'Delete UserStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->status_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserStatus', 'url'=>array('admin')),
);
?>

<h1>View UserStatus #<?php echo $model->status_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'status_id',
		'status_title',
	),
)); ?>
