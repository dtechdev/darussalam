<?php
/* @var $this PagesController */
/* @var $model Pages */

$this->breadcrumbs = array(
    'Pages' => array('index'),
    $model->title,
);

$this->renderPartial("/common/_left_menu");
?>

<h1>View Pages #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(

        array(
            'name' => 'city_id',
            'value' => $model->city->city_name,
            'type' => 'raw'
        ),
        'title',
        array(
            'name' => 'value',
            'value' => $model->content,
            'type' => 'raw'
        )
    ),
));
?>
