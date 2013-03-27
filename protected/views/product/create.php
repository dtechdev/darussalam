<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Product', 'url'=>array('index')),
	array('label'=>'Manage Product', 'url'=>array('admin')),
);
//print "<pre>";
//print_r($mProductDiscount);
//exit;
?>

<h1>Create Product</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
                        'mProductProfile'=>$mProductProfile,
			'mProductDiscount'=>$mProductDiscount,
			'mProductImage'=>$mProductImage,
			'mProductCategories'=>$mProductCategories,
			'mAuthor'=>$mAuthor,
			'mLanguage'=>$mLanguage,
			'cityList'=>$cityList,
			'languageList'=>$languageList
    )); ?>