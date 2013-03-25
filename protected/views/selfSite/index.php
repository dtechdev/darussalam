<?php
/* @var $this SelfSiteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Self Sites',
);

$this->menu=array(
	array('label'=>'Create SelfSite', 'url'=>array('create')),
	array('label'=>'Manage SelfSite', 'url'=>array('admin')),
);
?>

<h1>Self Sites</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
