<?php
/* @var $this ProductController */
/* @var $model Product */
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js');

$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->product_id,
);

if(!(Yii::app()->user->isGuest)) {
        $this->renderPartial("/common/_left_menu");
}
?>

<h1>View Product #<?php echo $model->product_id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'product_name',
            'value' => $model->product_name,
        ),
        array(
            'name' => 'product_description',
            'value' => $model->product_description,
        ),
        array(
            'name' => 'authors',
            'value' => implode("/",$model->getAuthors()),
        ),

        array(
            'name' => 'create_time',
            'value' => $model->create_time,
        ),
        array(
            'name' => 'is_featured',
            'value' => $model->is_featured,
        ),

    ),
));

$this->renderPartial('productProfile/_container', array('model' => $model, "type" => "form"));
$this->renderPartial('productCategories/_container', array('model' => $model, "type" => "form"));
//$this->renderPartial('productImages/_container', array('model' => $model, "type" => "form"));
?>
