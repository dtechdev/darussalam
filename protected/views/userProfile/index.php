<?php
/* @var $this UserProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Profiles',
);

$this->renderPartial("/common/_left_menu");
?>

<h1>User Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
