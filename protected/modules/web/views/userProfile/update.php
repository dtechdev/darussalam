<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->user_profile_id=>array('view','id'=>$model->user_profile_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserProfile', 'url'=>array('index')),
	array('label'=>'Create UserProfile', 'url'=>array('create')),
	array('label'=>'View UserProfile', 'url'=>array('view', 'id'=>$model->user_profile_id)),
	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>