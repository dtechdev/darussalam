<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->country_id,
);
if(!(Yii::app()->user->isGuest)) {
        $this->renderPartial("/common/_left_menu");
}
?>

<h1>View Country #<?php echo $model->country_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'country_name',
		'short_name',
		'site_id',
	),
)); ?>
