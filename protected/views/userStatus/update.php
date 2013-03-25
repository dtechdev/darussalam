<?php
/* @var $this UserStatusController */
/* @var $model UserStatus */

$this->breadcrumbs=array(
	'User Statuses'=>array('index'),
	$model->status_id=>array('view','id'=>$model->status_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserStatus', 'url'=>array('index')),
	array('label'=>'Create UserStatus', 'url'=>array('create')),
	array('label'=>'View UserStatus', 'url'=>array('view', 'id'=>$model->status_id)),
	array('label'=>'Manage UserStatus', 'url'=>array('admin')),
);
?>

<h1>Update UserStatus <?php echo $model->status_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>