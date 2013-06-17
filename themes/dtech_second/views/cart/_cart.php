
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
            $quantities = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10');
            echo CHtml::dropDownList('quantity' . $pro->cart_id, '', $quantities, array(
                'options' => array($pro->quantity => array('selected' => true)),
                'ajax' => array(
                    'type' => 'POST',
                    'url' => $this->createUrl('/web/cart/editcart'),
                    'data' => array('quantity' => 'js:jQuery(this).val()', 'type' => 'update_quantity', 
                        'cart_id' => $pro->cart_id,'from'=>"main"),
                    'dataType' => 'json',
                    'success' => 'function(data) {
                                                   
                                                    $("#loading").hide();
                                                    $("#cart_control").html(data._view_cart);
                                                    
                                                }',
                ))
            );
            ?>
            <h2><?php echo substr($pro->productProfile->product->product_name, 0, 5) . ".."; ?></h2>
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