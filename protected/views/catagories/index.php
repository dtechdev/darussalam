<?php
/* @var $this CatagoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Catagories',
);

$this->menu=array(
	array('label'=>'Create Catagories', 'url'=>array('create')),
	array('label'=>'Manage Catagories', 'url'=>array('admin')),
);
?>

<h1>Catagories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
