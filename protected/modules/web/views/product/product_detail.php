<div id="book_content">
    <div id="book_main_content">
        <?php $this->renderPartial("_subheader"); ?>
        <?php
        $this->widget('ext.lyiightbox.LyiightBox2', array(
        ));
        ?>
    </div>
</div>
<div id="descritpion">
    <div id="booked_content">
        <div class="left_book">
            <?php echo $this->renderPartial("_product_detail_image", array("product" => $product)) ?>
        </div>
    </div>
    <div class="right_book">
        <div class="book_data">
            <?php
            echo $this->renderPartial(
                    "_product_detail_data", array("product" => $product,
                "rating_value" => $rating_value));
            ?>
        </div>

        <div id="product_comments">


            <?php
            /* get comments here * */
            $this->renderPartial("_product_comments", array("product" => $product));
            /**
             *  add product comments
             */
            $this->renderPartial("_product_add_comments", array("product" => $product));
            ?>
        </div>
    </div>
</div>
</div>
<?php
;

Yii::app()->clientScript->registerScript('image_change_function', "
                    jQuery('.small_product img').click(function(){
                        dtech.detailImagechange(this)
                    })
                  
                ", CClientScript::POS_READY);
?>
<script>
    function totalPrice(quantity, price)
    {
        total_price = quantity * price;
        jQuery('#price').html('$' + total_price);
    }
</script>


