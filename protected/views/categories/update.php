<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->category_id=>array('view','id'=>$model->category_id),
	'Update',
);

if(!(Yii::app()->user->isGuest)) {
        $this->renderPartial("/common/_left_menu");
}
?>

<h1>Update Categories <?php echo $model->category_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
                        'categoriesList'=>$categoriesList,
                        'cityList'=>$cityList)); ?>