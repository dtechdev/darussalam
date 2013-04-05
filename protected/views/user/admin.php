<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

 $user_id = Yii::app()->user->id;
//$this->layout='column2';
if (Yii::app()->user->isAdmin || Yii::app()->user->isSuperAdmin) {
    $this->menu = array(
       // echo chtml::link(CHtml::encode('Change Your Profile'),array('changeProfile','id'=>$model->id))
        array('label'=>'Update Profile','url'=>array('/user/updateprofile/id/'.$user_id)),
        array('label' => 'Create Layout', 'url' => array('/layout/create')),
        array('label' => 'Manage Layout', 'url' => array('/layout/admin')),
        array('label' => 'Create User', 'url' => array('/user/create')),
        array('label' => 'Manage User', 'url' => array('/user/admin')),
        array('label' => 'Create City', 'url' => array('/city/create')),
        array('label' => 'Manage City', 'url' => array('/city/admin')),
        array('label' => 'Create Country', 'url' => array('/country/create')),
        array('label' => 'Manage Country', 'url' => array('/country/admin')),
        array('label'=>'Create Product', 'url'=>array('/product/create')),
	array('label'=>'Manage Product', 'url'=>array('/product/admin')),
        array('label'=>'Create Author', 'url'=>array('/author/create')),
	array('label'=>'Manage Author', 'url'=>array('/author/admin')),
        array('label'=>'Create Language', 'url'=>array('/language/create')),
	array('label'=>'Manage Language', 'url'=>array('/language/admin')),
        array('label'=>'Create Categories', 'url'=>array('/categories/create')),
	array('label'=>'Manage Categories', 'url'=>array('/categories/admin')),
    );
}
if(Yii::app()->user->isCustomer)
{
   
    $this->menu=array(array('label'=>'Update Profile','url'=>array('/user/updateprofile/id/'.$user_id)));
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

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'user_id',
		'user_password',
                'user_email',
		'role_id',
		'status_id',
		'city_id',
		/*
		'activation_key',
		'is_active',
		'site_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
