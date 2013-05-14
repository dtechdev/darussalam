<?php

/**
 * rendering all products listing
 */
echo $this->renderPartial('product_listing', array(
    'products' => $products,
    'allCate' => $allCate)
);
?>