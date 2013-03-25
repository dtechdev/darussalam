<?php
/* @var $this UserStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Statuses',
);

$this->menu=array(
	array('label'=>'Create UserStatus', 'url'=>array('create')),
	array('label'=>'Manage UserStatus', 'url'=>array('admin')),
);
?>

<h1>User Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
