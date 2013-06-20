<div class="general_content">

    <div class="shopping_bag">
        <h1>My Shopping Bag</h1>

        <div class="shopping_scroller">
            <?php
            //$this->dtdump($wishList);die;
            foreach ($wishList as $pro) {
//                $grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
//                $total_quantity+=$pro->quantity;
                ?>
                <div class="my_shopping">
                    <div class="left_shopping">
                        <section>

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
                foreach ($wishList as $pro) {
                    //$grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
                    //$total_quantity+=$pro->quantity;
                }
                // echo $grand_total;
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
    $grand_total = 0;
    $total_quantity = 0;
    $description = '';

    foreach ($wishList as $pro) {
//        $grand_total = $grand_total + ($pro->quantity * $pro->productProfile->price);
//        $total_quantity+=$pro->quantity;
//        $description.=$pro->productProfile->product->product_name . ' , ';

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
                        echo $pro->productProfile->product->product_name;
                        ?>
                    </h4>
                    <p>Item Code: 
                        <span>
                            <?php echo isset($pro->productProfile->item_code) ? $pro->productProfile->item_code : ""; ?>
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
                    <div class="shipping_button">
                        <?php
                        /*
                          ajax button for for delete cart data / cart management /card edit
                         */
                        echo CHtml::ajaxButton('Remove from WishList', $this->createUrl("/web/wishList/editwishlist"), array(
                            "type" => "POST",
                            'dataType' => 'json',
                            "data" => array(
                                "type" => 'delete_wishlist',
                                "id" => $pro->id,
                            ),
                            "success" => "function(data) {
                                                    $('#loading').hide();
                                                    jQuery('#wishList_container').html(data._view_list); 
                                                    jQuery('#wishlist_counter').html(data.wish_list_count);
                                               }",
                                ), array(
                            "onclick" => "
                                                if(confirm('Are you want to remove this item from wish list')){
                                                   $('#loading').show();
                                                 }
                                                 else {
                                                   return  false;
                                                 }
                                                "
                            , 'class' => 'remove_shipping')
                        );
                        ?>


                        <?php
                        echo CHtml::ajaxButton('Add to Cart', $this->createUrl('/cart/addtocart'), array('data' => array(
                                'product_profile_id' => $pro->product_profile_id,
                                'city_id' => !empty($_REQUEST['city_id']) ? $_REQUEST['city_id'] : Yii::app()->session['city_id'],
                                'city' => !empty($_REQUEST['city_id']) ? $_REQUEST['city_id'] : Yii::app()->session['city_id'],
                                'quantity' => '1'
                            ),
                            'type' => 'POST',
                            'dataType' => 'json',
                            'success' => 'function(data){
                                                    jQuery("#cart_counter").html(data.cart_counter);
                                                    dtech.custom_alert("Item has added to cart" ,"Add to Cart");
                                                }',
                                ), array('class' => 'add_shipping')
                        );
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>