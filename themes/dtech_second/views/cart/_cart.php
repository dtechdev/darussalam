
<ul class="sub-menu">
    <div id="pointer">
    </div>
    <h1>My Shopping Bag</h1>
    <?php
    $grand_total = 0;
    $total_quantity = 0;
    foreach ($cart as $pro) {
        $grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
        $total_quantity+=$pro->quantity;
        
      
        ?>
        <div class="sub-sub-menu">
            <?php
            
            echo CHtml::textField('quantity' . $pro->cart_id, $pro->quantity,
               array(
                   "class"=>"_small_cart_text",
                   "onkeyup"=>"
                            dtech_new.updateCart('".$this->createUrl('/web/cart/editcart')."',this,'".$pro->cart_id."');
                    ")     
            );
            ?>
            <h2><?php echo substr($pro->productProfile->product->product_name, 0, 10) . ".."; ?></h2>
            <span><?php echo round($pro->productProfile->price, 2); ?> PKR</span>
        </div>
        <?php
    }
    ?>
    <div class="total">
        <?php
        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/total_little_img_03.png");
        ?>
        <h3>TOTAL:</h3>
        <h4><?php echo $grand_total; ?> PKR</h4>
    </div>
    <div id="check_out_pointer">
    </div>
    <input type="button" value="CHECKOUT" class="check_out" />
</ul>