<div class="under_heading">
    <h2>Featured Books</h2>

    <?php
    echo CHtml::image(Yii::app()->theme->baseUrl . "/images/under_heading_07.png");
    ?>
</div>

<div class="pagingdiv">
    <?php
    $this->widget('DTPager', array(
        'pages' => $dataProvider->pagination,
        'ajax' => true,
        'append_param' => (!empty($_REQUEST['serach_field'])) ? "serach_field=" . $_REQUEST['serach_field'] : "",
        'jsMethod' => 'dtech.updatePaginationFilter(this);return false;',
            )
    );
    ?>
</div>
<div class="clear"></div>
<?php
foreach ($featured_products as $featured) {
    $name = $featured['product_name'];

    $image = $featured['no_image'];
    if (isset($featured['image'][0]['image_small'])) {
        $image = $featured['image'][0]['image_small'];
    }
    echo CHtml::openTag("div", array("class" => "featured_books", 'style' => 'padding:28px 50px'));
    echo CHtml::link(CHtml::image($image, $name, array('style' => 'width:92px; height:138px;margin:0 0 17px 0px; box-shadow: 0 0 5px 5px #888; padding:2px 2px')), $this->createUrl('/web/product/productDetail', array('product_id' => $featured['product_id'])), array('title' => $name));
    echo CHtml::openTag("h3");
    echo implode(' ', array_slice(explode(' ', $name), 0, 4));
    echo CHtml::closeTag("h3");
    echo CHtml::openTag("p");
    echo $featured['product_description'];
    echo CHtml::closeTag("p");
    echo CHtml::closeTag("div");
}
?>