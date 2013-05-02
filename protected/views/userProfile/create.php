<?php

/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs = array(
    'User Profiles' => array('index'),
    'Create',
);

$this->renderPartial("/common/_left_menu");
?>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>