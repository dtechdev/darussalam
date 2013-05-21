<?php
if (empty($wishList)) {
    ?>
    <div id="shopping_cart" style="height:308px;text-align:center;  ">
        <div id="main_shopping_cart">
            <div class="left_right_cart">
                Your Wishlist IS empty
            </div>
        </div>                                        
    </div>
    <?php
} else {
    ?>

    <div id="shopping_cart">
        <div id="main_shopping_cart">
            <div class="top_cart">
                <h1>Wishlist</h1>
                <?php //echo CHtml::image(Yii::app()->theme->baseUrl . "/images/shopping_cart_img_03.png") ?>
            </div>
            <div id="cart">
                <div class="left_cart">
                    <?php
                    $grand_total = 0;
                    $total_quantity = 0;
                    $description = '';
                    foreach ($wishList as $pro) {
                        $description.=$pro->productProfile->product->product_name . ' , ';
                        ?>

                        <div class="upper_cart">
                            <div class="left_left_cart">
                                <?php
                                $images = $pro->productProfile->getImage();
                                $image = $pro->productProfile->product['no_image'];
                                if (isset($images[0]['image_small'])) {
                                    $image = $images[0]['image_small'];
                                }

                                echo CHtml::image($image);
                                ?>
                            </div>
                            <div class="left_right_cart">
                                <h1><?php echo $pro->productProfile->product->product_name; ?></h1>

                                <?php
                                /*
                                  ajax link for for delete cart data / cart management /card edit
                                 */
                                echo CHtml::ajaxLink(
                                        CHtml::image(
                                                Yii::app()->theme->baseUrl . "/images/close_img_03.png", "Publish", array("title" => "Delete",
                                            "class" => "close_img",
                                                )
                                        ), $this->createUrl("/web/product/editwishlist"), array(
                                    "type" => "POST",
                                    'dataType' => 'json',
                                    "data" => array(
                                        "type" => 'delete_wishlist',
                                        "id" => $pro->id,
                                    ),
                                    "success" => 'function(data) {
                                                    $("#loading").hide();
                                                    jQuery("#wishList_container").html(data._view_list); 
                                                    jQuery("#wishlist_counter").html(data.wish_list_count);
                                                    dtech.custom_alert("Deleted from wishlist successfully");
                                               }',
                                        ), array(
                                    "onclick" => "
                                                if(confirm('Are you want to remove this item from wish list')){
                                                   $('#loading').show();
                                                 }
                                                 else {
                                                   return  false;
                                                 }
                                                "
                                        )
                                );
                                ?>
                                <h2><?php echo $pro->productProfile->product->product_description; ?></h2>
                                <table width="100%">
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Author</td>
                                        <td class="cart_right_td"><?php
                                            echo isset($pro->productProfile->product->author->author_name) ? $pro->productProfile->product->author->author_name : "";
                                            ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Language</td>
                                        <td class="cart_right_td"><?php
                                            echo isset($pro->productProfile->productLanguage->language_name) ? $pro->productProfile->productLanguage->language_name : "";
                                            ?></td>
                                    </tr>
                                    <tr class="cart_tr">
                                        <td class="cart_left_td">Price</td>
                                        <td class="cart_right_td">
                                            $<?php echo round($pro->productProfile->price, 2); ?>
                                        </td>
                                    </tr>
                                    <tr class="cart_tr">
                                        <td></td>
                                        <td class="add_cart">
                                            <?php
                                            echo CHtml::image(Yii::app()->theme->baseUrl . '/images/add_to_cart_img.png');
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
                                                    dtech.custom_alert("Added in cart successfully");
                                                }',
                                                    ), array('class' => 'add_to_cart')
                                            );
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div><?php
}?>