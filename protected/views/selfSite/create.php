<?php
/* @var $this SelfSiteController */
/* @var $model SelfSite */

$this->breadcrumbs=array(
	'Self Sites'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SelfSite', 'url'=>array('index')),
	array('label'=>'Manage SelfSite', 'url'=>array('admin')),
);
?>

<h1>Create SelfSite</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>