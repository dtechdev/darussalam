<?php
/* @var $this UserStatusController */
/* @var $model UserStatus */

$this->breadcrumbs=array(
	'User Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserStatus', 'url'=>array('index')),
	array('label'=>'Manage UserStatus', 'url'=>array('admin')),
);
?>

<h1>Create UserStatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>