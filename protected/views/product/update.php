<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->product_id=>array('view','id'=>$model->product_id),
	'Update',
);

$this->renderPartial("/common/_left_menu");
?>

<h1>Update Product <?php echo $model->product_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,

			'cityList'=>$cityList,
			'languageList'=>$languageList,
			'authorList'=>$authorList
    )); ?>