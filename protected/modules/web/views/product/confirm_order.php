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
                            <?php 

                            if(empty($cart))
                            {?>
                                <div id="shopping_cart" style="height:308px;text-align:center;  ">
    	                            <div id="main_shopping_cart">
                                        <div class="left_right_cart">
                                        Your Cart IS empty
                                      </div>
                                    </div>                                        
                                </div>
                            <?php
                                }  else {


                            ?>

    <div id="shopping_cart">
    	<div id="main_shopping_cart">
        	<div class="top_cart">
            	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/shopping_cart_img_04.png" />
            </div>
            <div id="cart">
                <div class="left_cart" style="width:66%">
                     <?php 
                     $grand_total=0;
                     $total_quantity=0;
                     $description='';
                            foreach($cart as $pro){
                                $grand_total=$grand_total+($pro->quantity*$pro->product->product_price);
                                $total_quantity+=$pro->quantity;
                                $description.=$pro->product->product_name.' , ';

                            ?>
                    
                	<div class="upper_cart">
                        <div class="left_left_cart">
                            <img width="90px" height="115px" src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$pro->product->productImages[0]->image_small;?>" />
                        </div>
                          
                           
                            
                        <div class="left_right_cart">
                            <h1><?php echo $pro->product->product_name;?></h1>
                            

                            <table width="100%">
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Unit Price</td>
                                    <td class="cart_right_td">$<?php echo round($pro->product->product_price,2);?></td>
                                </tr>
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Quantity</td>
                                    <td class="cart_right_td"><?php echo $pro->quantity;?></td>
                                </tr>
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Price</td>
                                    <td class="cart_right_td">$<?php echo round($pro->quantity*$pro->product->product_price,2);?></td>
                                </tr>
                                <tr class="cart_tr">
                                </tr>
                            </table>
                        </div>
                  	</div>
                    <?php }?>
                    
                   
                </div>
                <div class="right_right_cart" style="width:100%">
                	<div class="right_top_cart">
                		<h1>Confirm Order</h1>
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
                                <?php 
                                if($_REQUEST['type']=='paypal')
                                {
                                    Yii::app()->session['total_price']=  round($grand_total,2);
                                    Yii::app()->session['quantity']=$total_quantity;
                                    Yii::app()->session['description']=$description;
                                    ?>
                                    <a href="<?php echo  $this->createUrl('/web/Paypal/buy');?>"><input type="button" value="Place Order" class="check_out" /></a>
                                    <?php
                                }else
                                    {
                                    ?>
                                    <a href="<?php echo  $this->createUrl('/web/Paypal/directpayment');?>"><input type="button" value="Place Order" class="check_out" /></a>
                                    <?php }?>
                  	</div>
                </div>
           	</div>
        </div>
</div><?php }?>