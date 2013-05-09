<?php
/* @var $this TranslatorCompilerController */
/* @var $model TranslatorCompiler */

$this->breadcrumbs=array(
	'Translator Compilers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TranslatorCompiler', 'url'=>array('index')),
	array('label'=>'Create TranslatorCompiler', 'url'=>array('create')),
	array('label'=>'Update TranslatorCompiler', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TranslatorCompiler', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TranslatorCompiler', 'url'=>array('admin')),
);
?>

<h1>View TranslatorCompiler #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'activity_log',
	),
)); ?>
