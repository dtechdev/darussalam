<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->user_profile_id,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View UserProfile #<?php echo $model->user_profile_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_profile_id',
		'user_id',
		'first_name',
		'last_name',
		'address',
		'contact_number',
		'city',
		'gender',
		'avatar',
	),
)); ?>
