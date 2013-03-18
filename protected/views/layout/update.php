<?php
/* @var $this LayoutController */
/* @var $model Layout */

$this->breadcrumbs=array(
	'Layouts'=>array('index'),
	$model->layout_id=>array('view','id'=>$model->layout_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Layout', 'url'=>array('index')),
	array('label'=>'Create Layout', 'url'=>array('create')),
	array('label'=>'View Layout', 'url'=>array('view', 'id'=>$model->layout_id)),
	array('label'=>'Manage Layout', 'url'=>array('admin')),
);
?>

<h1>Update Layout <?php echo $model->layout_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>