<?php
/* @var $this CatagoriesController */
/* @var $model Catagories */

$this->breadcrumbs=array(
	'Catagories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Catagories', 'url'=>array('index')),
	array('label'=>'Manage Catagories', 'url'=>array('admin')),
);
?>

<h1>Create Catagories</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>