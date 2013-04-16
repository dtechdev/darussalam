<?php 
//print "<pre>";
//print_r($cart);
//echo $cart->cart_id;
foreach($cart as $pro){
   // print_r($pro->product->product_name);
    //print "<br />";
}
?>
<div id="book_content">
    	<div id="book_main_content">
        	<div class="left_book_main_content">
            	<a href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/darussalam-inner-logo.png" alt="logo" /></a>
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
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/small_product_img.png" />
                        </div>
                          
                           
                            
                        <div class="left_right_cart">
                            <h1><?php echo $pro->product->product_name;?></h1>
                            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/close_img_03.png" class="close_img" /></a>
                            <h2><?php echo $pro->product->product_description;?></h2>
                            <table width="100%">
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Author</td>
                                    <td class="cart_right_td">Abdul Malik Mujahid</td>
                                </tr>
                                <tr class="cart_tr">
                                    <td class="cart_left_td">Language</td>
                                    <td class="cart_right_td">English</td>
                                </tr>
                                <tr class="cart_tr">
                                </tr>
                            </table>
                            <div class="quantity_cart">
                                <p>$<?php echo round($pro->product->product_price,2);?></p>
                                <span>Quantity</span> 
                                <?php 
                                $quantities = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10');
                                echo CHtml::dropDownList('quantity'.$pro->cart_id,'', $quantities , array('options' => array($pro->quantity=>array('selected'=>true))),array( 'onChange' => 'javascript:totalPrice(this.value,"'.$pro->product->product_price.'")' ));
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
                        <input type="button" value="Checkout" class="check_out" />
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