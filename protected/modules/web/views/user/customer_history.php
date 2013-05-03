<div id="book_content">
    <div id="book_main_content">
        <div class="left_book_main_content">
            <a href="<?php echo $this->createUrl('/site/storehome', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])); ?>">
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/darussalam-inner-logo.png", 'logo') ?>
            </a>
        </div>
        <div class="search_box">
            <?php echo CHtml::textField('textsearch', '', array("class" => "search_text", "placeholder" => "Search keywords or image by keywords...")) ?>
            <?php echo CHtml::button('', array("class" => "search_btn")) ?>
            <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/searching_img_03.jpg", '', array("class" => "searching_img")) ?>
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo $this->createUrl('/site/page', array('view' => 'about')) ?>">About Us</a></li>
                <li><a href="<?php echo $this->createUrl('/site/contact') ?>">Contact Us</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </nav>
    </div>
</div>
<?php
if (empty($cart)) {
    ?>
    <div id="shopping_cart" style="height:308px;text-align:center;  ">
        <div id="main_shopping_cart">
            <div class="left_right_cart">
                You are new to this site.....Place some orders
            </div>
        </div>                                        
    </div>
    <?php
} else {
    ?>

    <HR>
    <center><h2><tt>Customer History</tt></h2></center>
    <div id="shopping_cart">
        <div id="main_shopping_cart">
            <div id="cart">
                <div class="left_cart">
                    <?php
                    $grand_total = 0;
                    $total_quantity = 0;
                    $description = '';
                    foreach ($cart->orderDetails as $pro) {

                        $total_quantity+=$pro->quantity;
                        $description.=$pro->product->product_name . ' , ';
                        ?>

                        <div class="upper_cart">
                            <div class="left_left_cart">
                                <?php
                                echo CHtml::image(Yii::app()->baseUrl . '/images/product_images/' . $pro->product->productImages[0]->image_small);
                                ?>
                            </div>
                            <div class="left_right_cart">
                                <h1><?php echo $pro->product->product_name; ?></h1>

                                <h2><?php echo $pro->product->product_description; ?></h2>
                                <table width="100%">
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Author :</td>
                                        <td class="cart_right_td"><?php
                                            foreach ($pro->product->productProfile as $pp) {
                                                echo $pp->author->author_name;
                                            }
                                            ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Language :</td>
                                        <td class="cart_right_td"><?php
                                            $i = 0;
                                            foreach ($pro->product->productLanguage as $lan) {
                                                if ($i == 0)
                                                    echo $lan->language->language_name;
                                                else
                                                    echo ' / ' . $lan->language->language_name;

                                                $i++;
                                            }
                                            ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Order Date :</td>
                                        <td class="cart_right_td"><?php
                                            echo $cart->order_date;
                                            ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                    </tr>
                                </table>
                                <div class="quantity_cart">
                                    <p><span> Quantity : &nbsp; &nbsp;</span> 
                                        <?php
                                        echo CHtml::label($pro->quantity, '');
                                        ?>
                                    </p>
                                    <p><span>Unit Price :</span>
                                        $<?php echo round($pro->product->product_price, 2); ?>
                                    </p>

                                    <p><span>Sub Total :</span>
                                        $<?php echo round($pro->quantity * $pro->product->product_price, 2); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>

            </div>
        </div>
    </div><?php
}?>