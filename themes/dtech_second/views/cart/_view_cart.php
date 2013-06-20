<div class="general_content">

    <?php
    $grand_total = 0;
    $total_quantity = 0;
    ?>
    <div class="shopping_bag">
        <h1>My Shopping Bag</h1>

        <div class="shopping_scroller">
            <?php
            foreach ($cart as $pro) {
                $grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
                $total_quantity+=$pro->quantity;
                ?>
                <div class="my_shopping">
                    <div class="left_shopping">
                        <section>

                            <div class="clear"></div>
                            <div class="quantity_text">
                                <input type="text" value="<?php echo $pro->quantity ?>" />
                            </div>
                            <div class="up_down">
                                <?php
                                echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/up_img_03.png", "", array("class" => "shipping_up_img")), $this->createUrl(''));
                                ?>
                                <?php
                                echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/down_img_03.png", "", array("class" => "shipping_down_img")), $this->createUrl(''));
                                ?>
                            </div>
                            <span><?php echo substr($pro->productProfile->product->product_name, 0, 10) . ".."; ?></span>
                        </section>
                    </div>
                    <div class="right_shopping"><?php echo round($pro->productProfile->price, 2); ?> PKR
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="total">
            <?php
            echo CHtml::image(Yii::app()->theme->baseUrl . "/images/total_little_img_03.png");
            ?>
            <h3>TOTAL:</h3>
            <h4>
                <?php
                $grand_total = 0;
                $total_quantity = 0;
                foreach ($cart as $pro) {
                    $grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
                    $total_quantity+=$pro->quantity;
                }
                echo $grand_total;
                ?>

                PKR
            </h4>
        </div>
        <div id="cart_check">
        </div>
        <input type="button" value="CHECKOUT" class="check_out" />
    </div>


    <?php
    /**
     * to handle the views 
     * links becasue every category may have different things
     * so 
     */
    $view_array = array(
        "Books" => array(
            "controller" => "product",
            "view" => "_books/_book_info"
        ),
        "Educational Toys" => array(
            "controller" => "educationToys",
        ),
        "Quran" => array(
            "controller" => "educationToys",
            "view" => "_quran/_quran_info"
        ),
        "Others" => array(
            "controller" => "others",
        ),
    );

    $grand_total = 0;
    $total_quantity = 0;
    $description = '';

    foreach ($cart as $pro) {
        $grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
        $total_quantity+=$pro->quantity;
        $description.=$pro->productProfile->product->product_name . ' , ';

        /**
         * setting parent category
         */
        $parent_cat = "Books";
        if (!empty($pro->productProfile->product->parent_category->category_name)) {
            $parent_cat = $pro->productProfile->product->parent_category->category_name;
        }

        $images = $pro->productProfile->getImage();
        $image = $pro->productProfile->product['no_image'];
        if (isset($images[0]['image_small'])) {
            $image = $images[0]['image_small'];
        }
        ?>



        <div class="shipping_books_and_content">
            <div class="under_view_heading">
                <h3>Shopping Cart</h3>
                <?php
                echo CHtml::image(Yii::app()->theme->baseUrl . "/images/under_heading_07.png");
                ?>
            </div>
            <div class="shipping_books">
                <div class="shipping_book">
                    <?php
                    //echo CHtml::image(Yii::app()->theme->baseUrl . "/images/friendship_img_03.png");
                    echo CHtml::link(CHtml::image($image, 'image', array('title' => $pro->productProfile->product->product_name)), $this->createUrl('/web/' . $view_array[$parent_cat]['controller'] . '/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $pro->productProfile->product->product_id)), array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $pro->productProfile->product->product_id));
                    ?>
                </div>
                <div class="shipping_content">

                    <h4>
                        <?php
//                        $this->dtdump($cart);
//                        die;
                        echo substr($pro->productProfile->product->product_name, 0, 10) . "..";
                        ?>
                    </h4>
                    <p>Item Code: 
                        <span>
                            <?php echo isset($pro->productProfile->item_code) ? $product->productProfile[0]->item_code : ""; ?>
                        </span>
                    </p>

                    <article>
                        <?php
                        echo CHtml::image(Yii::app()->theme->baseUrl . "/images/good_stars_img_03.png");
                        ?>
                        (7)
                    </article>
                    <section>Price   :<?php echo round($pro->productProfile->price, 2); ?> PKR
                        <div class="clear"></div>
                        <div class="quantity_text">
                            <input type="text" value="1" />
                        </div>
                        <div class="up_down">
                            <?php
                            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/up_img_03.png", "", array("class" => "shipping_up_img")), $this->createUrl(''));
                            ?>
                            <?php
                            echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/down_img_03.png", "", array("class" => "shipping_down_img")), $this->createUrl(''));
                            ?>
                        </div>

                    </section>
                    <input type="button" class="remove_shipping" value="Remove" />
                </div>
            </div>
        </div>
    <?php } ?>
</div>