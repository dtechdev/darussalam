<div class="right_detail">
    <h1><?php echo $product->product_name; ?></h1>
    <h2>Author: <span> <?php
            echo isset($product->author->author_name) ? $product->author->author_name : "";
            ?></span></h2>
    <p>
        <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/stars_img_03.png"); ?>
        (7)</p>
    <article>Length :500 Pages</article>
    <div class="add_to_cart_button">

        <?php
        echo CHtml::ajaxButton('Add to Cart', $this->createUrl('/cart/addtocart'), array('data' => array(
                'product_profile_id' => $product->productProfile[0]->id,
                'city_id' => !empty($_REQUEST['city_id']) ? $_REQUEST['city_id'] : Yii::app()->session['city_id'],
                'city' => !empty($_REQUEST['city_id']) ? $_REQUEST['city_id'] : Yii::app()->session['city_id'],
                'quantity' => 'js:jQuery(\'#quantity\').val()'
            ),
            'type' => 'POST',
            'dataType' => 'json',
            'success' => 'function(data){
                                           //jQuery(".cart_quantity").trigger("change");
                                           dtech.custom_alert("Item has added to cart" ,"Add to Cart");
                                           
                                      }',
                ), array('class' => 'add_to_cart_arrow')
        );
        ?>

    </div>
</div>
<div class="product_detail">


    <section>
        Available Languages: 
        <?php
        $languages = $product->getBookLanguages();

        if (count($languages) > 1) {

            echo CHtml::dropDownList('language', $product->productProfile[0]->language_id, $languages, array(
                'onchange' => '
                            jQuery("#loading").show();
                            jQuery.ajax({
                                type: "POST",
                                dataType: "json",
                                url: "' . $this->createUrl("/web/product/productDetailLang", array("id" => $product->product_id)) . '",
                                data: 
                                    { 
                                        lang_id: jQuery("#language").val() 
                                    }
                                }).done(function( msg ) {
                               
                                jQuery("#loading").hide();
                                
                                browser_string = "lang="+jQuery("#language option:selected").text();
                                dtech.updatehashBrowerUrl(browser_string);
                                
                                
                                jQuery("#img_detail").html(msg["left_data"]);
                                jQuery("#prod_detail").html(msg["right_data"]);
                            });    
                      '));
        } else {

            echo $product->productProfile[0]->language_name;
        }
        ?>
    </section>

    <section>ISBN: 
        <?php
        echo isset($product->productProfile[0]->isbn) ? $product->productProfile[0]->isbn : "";
        ?>
    </section>
    <section>
        Item Code:    <?php
        echo isset($product->productProfile[0]->item_code) ? $product->productProfile[0]->item_code : "";
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
        ?></section>

</div>