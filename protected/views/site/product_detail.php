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
            	<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$product->productImages[0]->image_large;?>" class="small_product_first">
                <div class="small_product">
                	<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$product->productImages[0]->image_small;?>" width="66px" height="95px">
                    <img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$product->productImages[0]->image_small;?>" width="66px" height="95px">
                    <img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$product->productImages[0]->image_small;?>" width="66px" height="95px">
                </div>
            </div>
            <div class="right_book">
            	<table width="400">
                	<div class="middle_book">
                        <h1>Loving Our Parents</h1>
                        <div class="products_img">
                        	<div class="fly_product_hover">
                            </div>
                            <div class="f_product_hover">
                            </div>
                            <div class="t_product_hover">
                            </div>
                            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/f_like_product_img_03.jpg"></a>
                        </div>
                        <h2>Stories of duties &amp; obligations</h2>
                   	</div>
                    <div class="prodcut_table">
                        <tr class="product_tr">
                            <td class="left_td">Author</td>
                            <td class="right_td"><?php 
                            foreach($product->productProfile as $pp)
                            {
                                echo $pp->author->author_name;
                            }?></td>
                        </tr>
                        <tr class="product_tr">
                            <td class="left_td">Language</td>
                            <td class="right_td"><?php 
                        $i=0;
                        foreach($product->productLanguage as $lan)
                        {
                            if($i==0)
                                echo $lan->language->language_name;
                            else 
                                echo ' / '.$lan->language->language_name;
                            
                             $i++;
                        }
                        ?></td>
                        </tr>
                        <tr class="product_tr">
                            <td class="left_td">ISBN No</td>
                            <td class="right_td"><?php 
                            foreach($product->productProfile as $isbn)
                            {
                                echo $isbn->isbn;
                            }?></td>
                        </tr>
                        <tr class="product_tr">
                            <td class="left_td">Category</td>
                            <td class="right_td"><?php 
                         $i=0;
                        foreach($product->productCategories as $cat)
                        {
                            if($i==0)
                                echo $cat->category->category_name;
                            else
                                echo ' / '.$cat->category->category_name;
                            $i++;
                        }
                        ?></td>
                        </tr>
                        <tr class="product_tr">
                            <td class="left_td">Availability</td>
                            <td class="right_td"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/yes_product_img_03.jpg">Yes</td>
                        </tr>
                        <tr class="product_tr">
                            <td class="left_td">Product Rating</td>
                            <td class="right_td"><?php 
                            $rate= $product->product_rating;
                            $this->widget('CStarRating',array(
                                            'name'=>'rating3',
                                            'minRating'=>1,
                                            'maxRating'=>5,
                                            'starCount'=>5,
                                            'value'=>$rate,
                                            'readOnly'=>true,
                                  //'cssFile'=>'css/style.css',
                                      ));

                            ?></td>
                        </tr>
                        <tr class="product_tr">
                        </tr>
                   	</div>
                    <div class="product_cart">
                    	<tr class="price_cart">
                        	<td class="price"><?php echo  '$ '.round($product->product_price,2);?></td>
                            <td class="quantity">Quantity 
                            <select>
                            	<option value="1"> 1
                                <option value="1"> 2
                                <option value="1"> 3
                                <option value="1"> 4
                            </select></td>
                            <td class="add_cart"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/add_to_cart_img.png" /><input type="button" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/add_to_cart_img.png" value="Add to Cart" class="add_to_cart" /></td>
                            <td class="wishlist"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/heart_img_03.jpg" /></a> Add to wishlist</td>
                        </tr>
                    </div>
                    </div>
                </table>
                <div class="product_para">
                	<p><?php echo $product->product_description;?></p>
               	</div>
                <div id="product_comments">

           <?php foreach ($product->product_reviews as $rev)
                                { ?>
                    <div class="comments">
                    	<div class="left_comments">
                        	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/talha_mujahid_img_03.png">
                            <h3><?php echo $rev->user->user_name;  
                             ?></h3>
                        </div>
                        
                        <div class="right_comments">
                        	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/right_arrow_img_03.png" class="comment_arrow" />
                                <p>
                                    <?php echo $rev->reviews;?>
                                </p>
                            <h4>11 hours ago <a href="#">- Report as inappropriate</a></h4>
                            <div class="bottom_border">
                            </div>
                        </div>
                                </div><?php } ?>
                    <div class="comments">
                    	<div class="left_comments">
                        	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/talha_mujahid_img_03.png">
                        </div>
                        
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'review-form',
                                    'action' => Yii::app()->createUrl('/user/ProductReview'),
                                    'enableClientValidation'=>true,
                                    'clientOptions'=>array(
                                            'validateOnSubmit'=>true,
                                        
                                    ),
                            )); ?>
                        <div class="right_comments">
                        	<div>
                        		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/right_arrow_img_03.png" class="comment_arrow" />
                           	</div>
                       		<textarea rows="2" cols="59"></textarea>
                            <input type="checkbox" class="comments_checkbox" value="Send me an email for each new comment."> <span>Send me an email for each new comment.</span>
                            <input type="button" value="Add Comment" class="add_comment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   	</div>
    