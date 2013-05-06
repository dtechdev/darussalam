<?php
/* @var $this ProductController */
/* @var $model Product */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js');

$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->product_id,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View Product #<?php echo $model->product_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'product_name',
        'added_date',
        'is_featured',
        'product_price',
    ),
));

$this->renderPartial('productImages/_container', array('model' => $model, "type" => "form"));
?>
