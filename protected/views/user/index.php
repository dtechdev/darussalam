<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);

if(Yii::app()->user->isAdmin){
   echo 'Welcome, administrator!';
 
}
if(Yii::app()->user->isSuperAdmin){
   echo 'You are the super administrator man!';
     
}
if(Yii::app()->user->IsCustomer)
{
    
    echo 'welcome customer';
    
}
?>

<h1>Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
