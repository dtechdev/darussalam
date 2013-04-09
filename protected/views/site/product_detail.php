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
    <div id="descritpion">
        <div id="booked_content">
        	<div class="left_book">
            	<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$product->productImages[0]->image_large;?>" />
            </div>
            <div class="right_book">
            	<h1>Golden Stories Of UMAR IBN AL KHATAM (R.A)</h1>
                <table width="400">
                	<tr>
                    	<td class="left_td">Language:</td>
                        <td class="right_td">English\Urdu\Spanish</td>
                    </tr>
                    <tr>
                    	<td class="left_td">Category:</td>
                        <td class="right_td"><?php 
                        foreach($product->productCategories as $cat)
                        {
                            echo $cat['name'];
                        }
                        ?></td>
                    </tr>
                    <tr>
                    	<td class="left_td">Writer:</td>
                        <td class="right_td"><?php //echo $product->author->name;?>Abdul Malik Mujahid</td>
                    </tr>
                    <tr>
                    	<td class="left_td">Publishers:</td>
                        <td class="right_td">Darussalam</td>
                    </tr>
                    <tr>
                        <td class="left_td">&dollar;<?php echo  round($product->product_price,2);?></td>
                        <td><input type="button" value="Add to Cart" /></td>
                        <td><input type="button" value="Add to Wishlist" /></td>
                    </tr>
                </table>
                <h2>Description</h2>
                <?php echo $product->product_description;?>
            </div>
        </div>
   	</div>