<?php
/* @var $this TranslatorCompilerController */
/* @var $model TranslatorCompiler */

$this->breadcrumbs=array(
	'Translator Compilers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TranslatorCompiler', 'url'=>array('index')),
	array('label'=>'Create TranslatorCompiler', 'url'=>array('create')),
	array('label'=>'View TranslatorCompiler', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TranslatorCompiler', 'url'=>array('admin')),
);
?>

<h1>Update TranslatorCompiler <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>