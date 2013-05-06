<?php
/* @var $this UserController */
/* @var $model User */

$user_id = Yii::app()->user->id;
//$this->layout='column2';
if (Yii::app()->user->isAdmin || Yii::app()->user->isSuperAdmin) {
   $this->renderPartial("/common/_left_menu");
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Orders List of selected User</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'order-grid',
    'dataProvider' => $model->search(),
    //'filter' => $model,
    'columns' => array(
        array(
            'name' => 'order_id',
            'type' => 'Raw',
            'value' => '$data->order_id',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'user_name',
            'type' => 'Raw',
            'value' => '!empty($data->user_id)?$data->user->userProfiles->first_name." ".$data->user->userProfiles->last_name:""',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'order_date',
            'type' => 'Raw',
            //'value' => 'if($data->status_id="1")?Active:"Inactive"',
            'value' => '$data->order_date',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'name' => 'order_price',
            'type' => 'Raw',
            //'value' => 'if($data->status_id="1")?Active:"Inactive"',
            'value' => '"&dollar;".$data->total_price',
            'headerHtmlOptions' => array(
                'style' => "text-align:left"
            )
        ),
        array(
            'class' => 'CLinkColumn',
            'label' => 'View Detail',
            'header' => 'Purchase History',
            'linkHtmlOptions'=>array(
                "ajax"=>array(
                    "type"=>"GET",
                    "update"=>"#order_detail",
                    "url"=>Yii::app()->controller->createUrl("/customer/orderDetail",array("country" => Yii::app()->session["country_short_name"], "city" => Yii::app()->session["city_short_name"], "city_id" => Yii::app()->session["city_id"])),
                    "data"=>'array("id"=>$data->order_id)',
                
                )
            ),
        ),
    ),
));
?>
<div id="order_detail"></div>
