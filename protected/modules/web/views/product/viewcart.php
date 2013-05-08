<div id="book_content">
    <div id="book_main_content">
        <?php $this->renderPartial("_subheader"); ?>
    </div>
</div>
<?php
if (empty($cart)) {
    ?>
    <div id="shopping_cart" style="height:308px;text-align:center;  ">
        <div id="main_shopping_cart">
            <div class="left_right_cart">
                Your Cart IS empty
            </div>
        </div>                                        
    </div>
    <?php
} else {
    ?>

    <div id="shopping_cart">
        <div id="main_shopping_cart">
            <div class="top_cart">
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/shopping_cart_img_03.png") ?>
            </div>
            <div id="cart">
                <div class="left_cart">
                    <?php
                    $grand_total = 0;
                    $total_quantity = 0;
                    $description = '';
                    foreach ($cart as $pro) {
                        $grand_total = $grand_total + ($pro->quantity * $pro->product->product_price);
                        $total_quantity+=$pro->quantity;
                        $description.=$pro->product->product_name . ' , ';
                        ?>

                        <div class="upper_cart">
                            <div class="left_left_cart">
                                <?php
                                $images = $pro->product->getImage();
                                $image = $pro->product['no_image'];
                                if (isset($images[0]['image_small'])) {
                                    $image = $images[0]['image_small'];
                                }
                              
                                echo CHtml::image($image);
                                ?>
                            </div>
                            <div class="left_right_cart">
                                <h1><?php echo $pro->product->product_name; ?></h1>

                                <?php
                                /*
                                  ajax link for for delete cart data / cart management /card edit
                                 */
                                echo CHtml::ajaxLink(
                                        CHtml::image(
                                                Yii::app()->theme->baseUrl . "/images/close_img_03.png", "Publish", array("title" => "Delete",
                                            "class" => "close_img",
                                                )
                                        ), $this->createUrl("/web/product/editcart"), array("type" => "POST",
                                    "dataType" => "json",
                                    "data" => array(
                                        "type" => 'delete_cart',
                                        "cart_id" => $pro->cart_id,
                                    ),
                                    "success" => "function(data) {
                                                             window.location.href=data.redirect
                                                                          }",
                                        )
                                );
                                ?>
                                <h2><?php echo $pro->product->product_description; ?></h2>
                                <table width="100%">
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Author</td>
                                        <td class="cart_right_td"><?php
                                            echo isset($pro->product->author->author_name) ? $pro->product->author->author_name : "";
//                                            foreach ($pro->product->productProfile as $pp) {
//                                                echo $pp->author->author_name;
//                                            }
                                ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Language</td>
                                        <td class="cart_right_td"><?php
                                    echo isset($pro->product->language->language_name) ? $pro->product->language->language_name : "";
//                                            $i = 0;
//                                            foreach ($pro->product->productLanguage as $lan) {
//                                                if ($i == 0)
//                                                    echo $lan->language->language_name;
//                                                else
//                                                    echo ' / ' . $lan->language->language_name;
//
//                                                $i++;
//                                            }
                                ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                    </tr>
                                </table>
                                <div class="quantity_cart">
                                    <p>$<?php echo round($pro->product->product_price, 2); ?></p>
                                    <span>Quantity</span> 
        <?php
        $quantities = array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10');
        echo CHtml::dropDownList('quantity' . $pro->cart_id, '', $quantities, array(
            'options' => array($pro->quantity => array('selected' => true)),
            'ajax' => array(
                'type' => 'POST',
                'url' => $this->createUrl('/web/product/editcart'),
                'data' => array('quantity' => 'js:jQuery(this).val()', 'type' => 'update_quantity', 'cart_id' => $pro->cart_id),
                'dataType' => 'json',
                'success' => 'function(data) {
                                                            window.location.href=data.redirect
                                                           }',
                                            ))
                                    );
                                    ?>
                                    <h3>$<?php echo round($pro->quantity * $pro->product->product_price, 2); ?></h3>
                                </div>
                            </div>
                        </div>
    <?php } ?>


                </div>
                <div class="right_right_cart">
                    <div class="right_top_cart">
                        <h1>Your Order</h1>
                        <table width="100%">
                            <tr class="right_cart_tr">
                                <td class="left_cart_td">Order Subtotal</td>
                                <td class="right_cart_td">$<?php echo $grand_total; ?></td>
                            </tr>
                            <tr class="right_cart_tr">
                                <td class="left_cart_td">Shipping</td>
                                <td class="right_cart_td">FREE</td>
                            </tr>
                            <tr class="right_cart_tr">
                                <td class="left_left_cart_td">Total</td>
                                <td class="right_right_cart_td">$<?php echo $grand_total; ?></td>
                            </tr>
                        </table>
    <?php
    if (Yii::app()->user->id) {
        Yii::app()->session['total_price'] = round($grand_total, 2);
        Yii::app()->session['quantity'] = $total_quantity;
        Yii::app()->session['description'] = $description;
        ?>
                            <a href="<?php echo $this->createUrl('/web/product/paymentmethod'); ?>">
                            <?php echo CHtml::submitButton('Checkout', array('class' => 'check_out')); ?>
                            </a>
                                <?php
                            } else {
                                ?>
                            <a href="<?php echo $this->createUrl('/web/site/login'); ?>">
                            <?php echo CHtml::submitButton('Checkout', array('class' => 'check_out')); ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><?php
                }?>
