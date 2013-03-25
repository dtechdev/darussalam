<?php
/* @var $this SelfSiteController */
/* @var $model SelfSite */

$this->breadcrumbs=array(
	'Self Sites'=>array('index'),
	$model->site_id=>array('view','id'=>$model->site_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SelfSite', 'url'=>array('index')),
	array('label'=>'Create SelfSite', 'url'=>array('create')),
	array('label'=>'View SelfSite', 'url'=>array('view', 'id'=>$model->site_id)),
	array('label'=>'Manage SelfSite', 'url'=>array('admin')),
);
?>

<h1>Update SelfSite <?php echo $model->site_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>