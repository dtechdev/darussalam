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
                	<li><a href="<?php echo $this->createUrl('/site/page',array('view'=>'about'))?>">About Us</a></li>
                    <li><a href="<?php echo $this->createUrl('/site/contact')?>">Contact Us</a></li>
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
                    <?php foreach($product->productImages as $img)
                    {?>
                	<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$img->image_small;?>" width="66px" height="95px">

                  <?php }?>
                </div>
            </div>
            <div class="right_book">
            	<table width="400">
                	<div class="middle_book">
                        <h1><?php echo $product->product_name;?></h1>
                        <div class="products_img">
                            
                            <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                  var js, fjs = d.getElementsByTagName(s)[0];
                                  if (d.getElementById(id)) return;
                                  js = d.createElement(s); js.id = id;
                                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                                  fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                            
                        	<div class="fly_product_hover">
                            </div>
                            <div class="f_product_hover">
                            </div>
                            <div class="t_product_hover">
                            </div>
                            <a href="#">
                             <div class="fb-like" data-href="http://darussalam.ilsainteractive.com"  data-layout="button_count" data-width="200" data-show-faces="true"></div></a>
                        </div>
                        <h2><?php echo $product->product_description;?></h2>
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
			    //$ratings=array();
			  
			    $criteriaCRating=new CDbCriteria;
                            $criteriaCRating->select='avg(rating) as avgRate,rating';
                            $criteriaCRating->condition='product_id='.$product->product_id;
                            $ratings=  ProductReviews::model()->findAll($criteriaCRating);
			    if(empty($ratings[0]->avgRate))
			    {
				$ratings[0]->avgRate=5;
			       $valu=$ratings[0]->avgRate;
			    }
			    else
			    {
				$valu=$ratings[0]->avgRate;
                            }
                            $this->widget('CStarRating',array(
                                            'name'=>'ratings',
                                            'minRating'=>1,
                                            'maxRating'=>5,
                                            'starCount'=>5,
                                            'value'=>round($valu),
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
                        	<td class="price"  id="price"><?php echo  '$ '.round($product->product_price,2);?></td>
                            <td class="quantity">Quantity 
                            <?php 
                                $quantities = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10');
                                echo CHtml::dropDownList('quantity','', $quantities,array( 'onChange' => 'javascript:totalPrice(this.value,"'.$product->product_price.'")' ), array());
                                ?>
                            </td>
                            <td class="add_cart"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/add_to_cart_img.png" />
                                
<!--                                <input type="button" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/add_to_cart_img.png" value="Add to Cart" class="add_to_cart" />-->
                            <?php echo CHtml::ajaxButton('Add to Cart',
                                                Yii::app()->createUrl('product/addtocart'),
                                                array('data'=>array(
                                                                    'product_id'=>$product->product_id,
                                                                    'quantity'=>'js:$(\'#quantity\').val()'
                                                                    ),
                                                    'type'=>'POST',
                                                    'dataType' => 'json',
                                                       'success'=>'function(data){
                                                                                $("#cart_counter").html(data.cart_counter);
                                                                                }',
                                                        
                                                    ),
                                                    array('class'=>'add_to_cart')
                                                
                                    );?>
                            </td>
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
                            <h3><?php 
                            if($rev->user->user_name!=NULL)
                            {
                            echo $rev->user->user_name;
                            }
                           else {
                              echo $rev->user->user_email; 
                           }
                             ?></h3>
                        </div>
                        
                        <div class="right_comments">
                        	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/right_arrow_img_03.png" class="comment_arrow" />
                                <p>
                                    <?php echo $rev->reviews;?>
                                </p>
                            <h4><?php //echo time()-$rev->added_date;
                            $numDays = round(abs(time() - $rev->added_date)/86400 % 7);
                            $numHours = round(abs(time() - $rev->added_date)/ 3600 % 24);
                            $numMinutes = round(abs(time() - $rev->added_date)/ 60 % 60);
                            $numSeconds = round(abs(time() - $rev->added_date)% 60);
                            $remainingtime='';
                            if($numDays!=0 AND $numDays==1)
                            {
                                $remainingtime.=$numDays.' Day ';
                            }
                            if($numDays!=0 AND $numDays >1)
                            {
                                $remainingtime.=$numDays.' Days ';
                            }
                            if($numHours!=0)
                            {
                                $remainingtime.=$numHours.' Hours ';
                            }
                            if($numMinutes!=0)
                            {
                                $remainingtime.=$numMinutes.' Minutes ';
                            }
                            if($numSeconds!=0)
                            {
                                $remainingtime.=$numSeconds.' Seconds ';
                            }

                            echo $remainingtime;

                            ?> ago <a href="#">- Report as inappropriate</a></h4>
                            <div class="bottom_border">
                                <?php
                                $ratePerUser= $rev->rating;
                              
                                 $this->widget('CStarRating',array(
                                            'name'=>'rating'.$rev->reviews_id,
                                            'minRating'=>1,
                                            'maxRating'=>5,
                                            'starCount'=>5,
                                            'value'=>$ratePerUser,
                                            'readOnly'=>TRUE,
                                  //'cssFile'=>'/css/rating.css',
                                      ));
                                            
                                
                                ?>
                            </div>
                        </div>
                                </div><?php } ?>
                    
                    <?php $form=$this->beginWidget('CActiveForm', array(
                                    'id'=>'login-form',
                                    'action' => Yii::app()->createUrl('/user/ProductReview'),
                                    'enableClientValidation'=>true,
                                    'clientOptions'=>array(
                                                'validateOnSubmit'=>true,
                                        
                                    ),
                            )); ?>
                    <div class="comments">
                    	<div class="left_comments">
                        	<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/talha_mujahid_img_03.png">
                        </div>
                        <div class="right_comments">
                        	<div>
                        		<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/right_arrow_img_03.png" class="comment_arrow" />
                           	</div>
                       		

                                   <?php 
                                   $modelC= new  ProductReviews;
                                   $pid=$product->product_id;
                                   if(Yii::app()->user->id!=NUll)
                                {
                                   echo $form->textArea($modelC, 'reviews', $htmlOptions=array('maxlength' => 300, 'rows'=>'2', 'cols'=>'59'));
                                }else { 
                                  echo $form->textArea($modelC, 'reviews', $htmlOptions=array('maxlength' => 300, 'rows'=>'2', 'cols'=>'59','readonly'=>'readonly'));
                                  
                                }
                                $this->widget('CStarRating',array(
						'name'=>'ratingUser',
                                            'minRating'=>1,
                                            'maxRating'=>5,
                                            'starCount'=>5,
                                             'value'=> 3,
                                            'readOnly'=>false,
                                  //'cssFile'=>'/css/rating.css',
                                      ));
                                   echo $form->hiddenField($modelC,'product_id',array('value'=>$pid)); 
                                   
                                   ?>

                               <?php echo $form->checkBox($modelC,'is_email',$htmlOptions=array('class'=>'comments_checkbox')); ?>
                                <span>Send me an email for each new comment.</span>
                               <?php if(Yii::app()->user->id!=NUll)
                                {
                             echo CHtml::submitButton('Add Comments',array('class'=>'add_comment'));
                             }else
                             {
                               echo CHtml::submitButton('Add Comments',$htmlOptions=array('class'=>'add_comment','disabled'=>'disabled'));  
                             }?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
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
    