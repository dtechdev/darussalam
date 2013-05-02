<?php
/* @var $this ProductController */
/* @var $model Product */

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
?>
