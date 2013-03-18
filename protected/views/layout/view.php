<?php
/* @var $this LayoutController */
/* @var $model Layout */

$this->breadcrumbs=array(
	'Layouts'=>array('index'),
	$model->layout_id,
);

$this->menu=array(
	array('label'=>'List Layout', 'url'=>array('index')),
	array('label'=>'Create Layout', 'url'=>array('create')),
	array('label'=>'Update Layout', 'url'=>array('update', 'id'=>$model->layout_id)),
	array('label'=>'Delete Layout', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->layout_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Layout', 'url'=>array('admin')),
);
?>

<h1>View Layout #<?php echo $model->layout_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'layout_id',
		'layout_name',
		'layout_description',
		'layout_color',
		'site_id',
	),
)); ?>
