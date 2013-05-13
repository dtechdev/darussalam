<?php
/* @var $this LayoutController */
/* @var $model Layout */

$this->breadcrumbs=array(
	'Layouts'=>array('index'),
	$model->layout_id,
);

if(!(Yii::app()->user->isGuest)) {
        $this->renderPartial("/common/_left_menu");
}
?>

<h1>View Layout #<?php echo $model->layout_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'layout_name',
		'layout_description',
		'layout_color',
	),
)); ?>
