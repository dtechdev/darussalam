<?php
/* @var $this CatagoriesController */
/* @var $model Catagories */

$this->breadcrumbs=array(
	'Catagories'=>array('index'),
	$model->catagory_id=>array('view','id'=>$model->catagory_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Catagories', 'url'=>array('index')),
	array('label'=>'Create Catagories', 'url'=>array('create')),
	array('label'=>'View Catagories', 'url'=>array('view', 'id'=>$model->catagory_id)),
	array('label'=>'Manage Catagories', 'url'=>array('admin')),
);
?>

<h1>Update Catagories <?php echo $model->catagory_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>