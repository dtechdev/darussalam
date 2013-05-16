<?php

/**
 * rendering all products listing
 */
echo $this->renderPartial('product_listing', array(
    'products' => $products,
    'allCate' => $allCate)
);

?>
<?php 
    Yii::app()->clientScript->registerScript('change_cat_script', '
        dtech.loadallPrdoucts_Cat("'.$this->createUrl("/web/product/productfilter").'");
    ', CClientScript::POS_READY);
?>
