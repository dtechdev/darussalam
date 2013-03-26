<?php
/* @var $this CatagoriesController */
/* @var $model Catagories */

$this->breadcrumbs=array(
	'Catagories'=>array('index'),
	$model->catagory_id,
);

$this->menu=array(
	array('label'=>'List Catagories', 'url'=>array('index')),
	array('label'=>'Create Catagories', 'url'=>array('create')),
	array('label'=>'Update Catagories', 'url'=>array('update', 'id'=>$model->catagory_id)),
	array('label'=>'Delete Catagories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->catagory_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Catagories', 'url'=>array('admin')),
);
?>

<h1>View Catagories #<?php echo $model->catagory_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'catagory_id',
		'catagory_name',
		'added_date',
		'parent_id',
		'city_id',
	),
)); ?>
