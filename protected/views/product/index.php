<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs = array(
    'Products' => array('index'),
    'Manage',
);

$this->renderPartial("/common/_left_menu");

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Add New Products</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'product-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'product_name',
            'type' => 'Raw',
            'value' => '$data->product_name',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'product_description',
            'type' => 'Raw',
            'value' => '$data->product_description',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'city_id',
            'type' => 'Raw',
            'value' => '!empty($data->city)?$data->city->city_name:""',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'is_featured',
            'type' => 'Raw',
            'value' => '($data->is_featured==1)?"Yes":"No"',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'product_price',
            'type' => 'Raw',
            'value' => '"&dollar;".$data->product_price',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'product_rating',
            'type' => 'Raw',
            'value' => '$data->product_rating',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'create_time',
            'type' => 'Raw',
            'value' => '$data->create_time',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>