<?php

/**
 * rendering all products listing
 */
echo $this->renderPartial('/product/product_listing', array(
    'products' => $products,
    'dataProvider'=>$dataProvider,
    'allCate' => $allCate)
);

?>
<?php 
    Yii::app()->clientScript->registerScript('change_cat_script', '
        dtech.loadallPrdoucts_Cat("'.$this->createUrl("/web/product/allproducts").'");
    ', CClientScript::POS_READY);
?>
