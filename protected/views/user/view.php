<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_id,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View User #<?php echo $model->user_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
                'user_email',
		'user_password',
		'role_id',
		'status_id',
		'city_id',
		'is_active',
		'site_id',
	),
)); ?>
