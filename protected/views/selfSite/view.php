<?php
/* @var $this SelfSiteController */
/* @var $model SelfSite */

$this->breadcrumbs=array(
	'Self Sites'=>array('index'),
	$model->site_id,
);

$this->menu=array(
	array('label'=>'List SelfSite', 'url'=>array('index')),
	array('label'=>'Create SelfSite', 'url'=>array('create')),
	array('label'=>'Update SelfSite', 'url'=>array('update', 'id'=>$model->site_id)),
	array('label'=>'Delete SelfSite', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->site_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SelfSite', 'url'=>array('admin')),
);
?>

<h1>View SelfSite #<?php echo $model->site_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'site_id',
		'site_name',
		'site_descriptoin',
	),
)); ?>
