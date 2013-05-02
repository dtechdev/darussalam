<?php
/* @var $this SelfSiteController */
/* @var $model SelfSite */

$this->breadcrumbs=array(
	'Self Sites'=>array('index'),
	$model->site_id,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View SelfSite #<?php echo $model->site_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'site_name',
		'site_descriptoin',
	),
)); ?>
