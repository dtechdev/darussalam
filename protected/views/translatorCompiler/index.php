<?php
/* @var $this TranslatorCompilerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Translator Compilers',
);

$this->menu=array(
	array('label'=>'List TranslatorCompiler', 'url'=>array('index')),
	array('label'=>'Create TranslatorCompiler', 'url'=>array('create')),
);
?>

<h1>Translator Compilers</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
        'id' => 'trans-grid',
	//'itemView'=>'_view',
)); ?>
