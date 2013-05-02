<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$model->title,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View Pages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'city_id',
		'title',
		'content',
		
	),
)); ?>
