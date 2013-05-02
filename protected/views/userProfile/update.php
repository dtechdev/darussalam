<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->user_profile_id=>array('view','id'=>$model->user_profile_id),
	'Update',
);

$this->renderPartial("/common/_left_menu");
?>

<h1>Update UserProfile <?php echo $model->user_profile_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>