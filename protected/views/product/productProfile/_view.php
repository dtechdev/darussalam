<?php

Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/gridform.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/functions.js');
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array(
            'name' => 'item_code',
            'value' => $model->item_code,
        ),
        array(
            'name' => 'language_id',
            'value' => $model->productLanguage->language_name,
        ),
        array(
            'name' => 'price',
            'value' => $model->price,
        ),
        array(
            'name' => 'size',
            'value' => $model->size,
        ),
        array(
            'name' => 'no_of_pages',
            'value' => $model->no_of_pages,
        ),
        array(
            'name' => 'binding',
            'value' => $model->binding,
        ),
        array(
            'name' => 'printing',
            'value' => $model->printing,
        ),
        array(
            'name' => 'paper',
            'value' => $model->paper,
        ),
    ),
));

$this->renderPartial('productImages/_container', array('model' => $model, "type" => "form"));
?>