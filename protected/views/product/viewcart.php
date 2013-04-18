<div id="book_content">
    	<div id="book_main_content">
        	<div class="left_book_main_content">
            	<a href="<?php echo $this->createUrl('/site/storehome',array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id']));?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/darussalam-inner-logo.png" alt="logo" /></a>
            </div>
            <div class="search_box">
            	<input type="text" placeholder="Search keywords or image ids..." value="" class="search_text" />
                <input type="button" name="" value="" class="search_btn" /><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/searching_img_03.jpg" class="searching_img" />
            </div>
            <nav>
            	<ul>
                	<li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </nav>
      	</div>
   	</div>
    <div id="shopping_cart">
    	<div id="main_shopping_cart">
        	<div class="top_cart">
            	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shopping_cart_img_03.png" />
            </div>
            <div id="cart">
                <div class="left_cart">
                     <?php 
                     $grand_total=0;
                            foreach($cart as $pro){
                                $grand_total=$grand_total+($pro->quantity*$pro->product->product_price);

                            ?>
                    
                	<div class="upper_cart">
                        <div class="left_left_cart">
                            <img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$pro->product->productImages[0]->image_small;?>" />
                        </div>
                          
                           
                            
                        <div class="left_right_cart">
                            <h1><?php echo $pro->product->product_name;?></h1>
                            <?php
                            echo 
        CHtml::ajaxLink(
                CHtml::image(
                        Yii::app()->theme->baseUrl . "/images/close_img_03.png",
                        "Publish",
                        array(
                                "title"=>"Delete",
                                "class"=>"close_img",
                        )
                ),
                Yii::app()->createUrl("product/editcart"),
                array(
                        "type"=>"POST",
                        "dataType"=>"json",
                        "data"=>array(
                                "type"=>'delete_cart',
                                "cart_id"=>$pro->cart_id,
                        ),
                        "success"=>"function(data) {
                                                            window.location.href=data.redirect
                                                           }",
                )
        );

                            ?>
<!--                            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/close_img_03.png" class="close_img" /></a>-->
                            <h2><?php echo $pro->product->product_description;?></h2>
                            <table width="100%">
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Author</td>
                                    <td class="cart_right_td"><?php 
                            foreach($pro->product->productProfile as $pp)
                            {
                                echo $pp->author->author_name;
                            }?></td>
                                </tr>
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Language</td>
                                    <td class="cart_right_td"><?php 
                        $i=0;
                        foreach($pro->product->productLanguage as $lan)
                        {
                            if($i==0)
                                echo $lan->language->language_name;
                            else 
                                echo ' / '.$lan->language->language_name;
                            
                             $i++;
                        }
                        ?></td>
                                </tr>
                                <tr class="cart_tr">
                                </tr>
                            </table>
                            <div class="quantity_cart">
                                <p>$<?php echo round($pro->product->product_price,2);?></p>
                                <span>Quantity</span> 
                                <?php 
                                $quantities = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10');
                                echo CHtml::dropDownList('quantity'.$pro->cart_id,'', $quantities ,
                                        array(
                                            'options' => array($pro->quantity=>array('selected'=>true)),
                                            'ajax'=>array(
                                            'type'=>'POST',
                                            'url'=>Yii::app()->createUrl('product/editcart'),
                                            'data'=>array('quantity'=>'js:jQuery(this).val()','type'=>'update_quantity','cart_id'=>$pro->cart_id),
                                            'dataType' => 'json',
                                            'success' => 'function(data) {
                                                            window.location.href=data.redirect
                                                           }',
                                        ))
                                        );
                                ?>
                                <h3>$<?php echo round($pro->quantity*$pro->product->product_price,2);?></h3>
                            </div>
                        </div>
                  	</div>
                    <?php }?>
                    
                   
                </div>
                <div class="right_right_cart">
                	<div class="right_top_cart">
                		<h1>Your Order</h1>
                        <table width="100%">
                            <tr class="right_cart_tr">
                                <td class="left_cart_td">Order Subtotal</td>
                                <td class="right_cart_td">$<?php echo $grand_total;?></td>
                            </tr>
                            <tr class="right_cart_tr">
                                <td class="left_cart_td">Shipping</td>
                                <td class="right_cart_td">FREE</td>
                            </tr>
                            <tr class="right_cart_tr">
                                <td class="left_left_cart_td">Total</td>
                                <td class="right_right_cart_td">$<?php echo $grand_total;?></td>
                            </tr>
                      	</table>
                                <?php if (Yii::app()->user->id)
                                {?>
                                  <a href="<?php echo $this->createUrl('/product/paymentmethod');?>"><input type="button" value="Checkout" class="check_out" /></a>
                                 
                                <?php }  else { ?>
                                <a href="<?php echo $this->createUrl('/site/login');?>"><input type="button" value="Checkout" class="check_out" /></a>
                                     <?php } ?>
                  	</div>
                </div>
           	</div>
        </div>
    </div>

        <script>
    function totalPrice(quantity,price)
    {
        total_price=quantity*price;
        $('#price').html('$'+total_price);
    }    
    </script>