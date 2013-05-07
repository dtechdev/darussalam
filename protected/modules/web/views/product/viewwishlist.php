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
                Your Wish List IS empty
            </div>
        </div>                                        
    </div>
    <?php
} else {
    ?>

    <div id="shopping_cart">
        <div id="main_shopping_cart">
            <div class="top_cart">
                <h1>Wish List</h1>
                <?php //echo CHtml::image(Yii::app()->theme->baseUrl . "/images/shopping_cart_img_03.png") ?>
            </div>
            <div id="cart">
                <div class="left_cart">
                    <?php
                    $grand_total = 0;
                    $total_quantity = 0;
                    $description = '';
                    foreach ($cart as $pro) {
                        $description.=$pro->product->product_name . ' , ';
                        ?>

                        <div class="upper_cart">
                            <div class="left_left_cart">
                                <?php
                                if (empty($pro->product->productImages[0])) {
                                    echo CHtml::image($pro->product->no_image);
                                } else {
                                    echo CHtml::image(Yii::app()->baseUrl . '/images/product_images/' . $pro->product->productImages[0]->image_small);
                                }
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
                                        ), $this->createUrl("/web/product/editwishlist"), array("type" => "POST",
                                    "dataType" => "json",
                                    "data" => array(
                                        "type" => 'delete_wishlist',
                                        "id" => $pro->id,
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
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div><?php
                }?>