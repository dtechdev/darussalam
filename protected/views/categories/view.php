<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->category_id,
);

if(!(Yii::app()->user->isGuest)) {
        $this->renderPartial("/common/_left_menu");
}
?>

<h1>View Categories #<?php echo $model->category_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'category_name',
        'added_date',
    ),
));
?>
