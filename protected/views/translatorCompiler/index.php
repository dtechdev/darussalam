<?php
/* @var $this TranslatorCompilerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Translator Compilers',
);

$this->menu=array(
	array('label'=>'Create TranslatorCompiler', 'url'=>array('create')),
	array('label'=>'Manage TranslatorCompiler', 'url'=>array('admin')),
);
?>

<h1>Translator Compilers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
