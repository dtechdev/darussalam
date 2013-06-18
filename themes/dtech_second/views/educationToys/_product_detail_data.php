<div class="right_detail">
    <h1><?php echo $product->product_name; ?></h1>

    <p>
        <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/stars_img_03.png"); ?>
        (7)</p>

    <article>
        <?php
        echo CHtml::textField('quantity', '1', array('onKeyUp' => 'javascript:totalPrice(this.value,"' . $product->productProfile[0]->price . '")', 'style' => 'width:40px', 'maxlength' => '3'));
        ?>
    </article>
    <div class="add_to_cart_button">

        <?php
        echo CHtml::button('Add to Cart', array('onclick' => '
                            jQuery("#loading").show();
                            jQuery.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "' . $this->createUrl("/cart/addtocart", array("product_profile_id" => $product->productProfile[0]->id)) . '",
                                data: 
                                    { 
                                        quantity: jQuery("#quantity").val(),
                                    }
                                }).done(function( msg ) {
                               
                                jQuery("#loading").hide();
                                dtech.custom_alert("Item has added to cart" ,"Add to Cart");
                               
                            });    
                      ', 'class' => 'add_to_cart_arrow'));
        ?>

    </div>
</div>
<div class="product_detail">


    <section>
        Item Code:    <?php
        echo isset($product->educationToys[0]->item_code) ? $product->educationToys[0]->item_code : "";
        ?>
    </section>
    <section>Category: <?php
        $cat_count = 0;
        foreach ($product->productCategories as $cat) {
            if ($cat_count == 0) {
                echo $cat->category->category_name;
            } else {
                echo ' / ' . $cat->category->category_name;
            }
            $cat_count++;
        }
        ?>
    </section>
    <section>Price: <?php
        echo isset($product->educationToys[0]->price) ? '$ ' . round($product->educationToys[0]->price, 2) : "";
        ?>
    </section>

</div>

<script>
    function totalPrice(quantity, price)
    {
        if (dtech.isNumber(quantity))
        {
            //total_price = quantity * price;
            //jQuery('#price').html('$ ' + total_price);
        }
        else
        {
            dtech.custom_alert('Quantity should be Numeric....!');
            jQuery('#quantity').val('1');
        }
    }
</script>