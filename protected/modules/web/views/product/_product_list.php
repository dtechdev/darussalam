<?php
/**
 *  this code is resposible for rendering product list view
 *  against categories
 * 
 */
?>

<?php
foreach ($products as $product) {
    ?>
    <div class="condition">
        <?php
        $image = $product['no_image'];
        if (isset($product['image'][0]['image_small'])) {
            $image = $product['image'][0]['image_small'];
        }
        echo CHtml::link(CHtml::image($image, 'image'), $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $product['product_id'])));
        ?>
        <h3>
            <?php
            echo CHtml::link($product['product_name'], $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $product['product_id'])));
            ?>
        </h3>
        <p>
            <?php
            echo implode(",", $product['author']);
            ?>
        </p>
        <article>&dollar;<?php echo round($product['product_price'], 2); ?></article>
    </div>
<?php } ?>