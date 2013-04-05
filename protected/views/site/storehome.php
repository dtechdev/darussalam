    <div id="left_books">
            	<h2>FEATURED PRODUCTS <span>( <a href="#">VIEW ALL</a> )</span></h2>
<?php
//echo Yii::app()->getBaseUrl(true);
foreach($product as $featured)
{
    $name=$featured['product_name'];
    foreach($featured['image'] as $image)
     {
       ?>
                <div class="books">
                	<a href="#"><img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$image['image_large'];?>" alt="Pen QURAN PAK" /></a>
                    <p><a href="#"><?php echo $name; ?></a></p>
                </div>
       <?php
       break;
    }
}
?>
</div>
<div id="right_books">
    <h2>BEST SELLING BOOKS <span>( <a href="#">VIEW ALL</a> )</h2>
<?php
foreach($best_sellings as $bests)
{
    $pro_name=$bests['product_name'];
     $orders= '('.$bests['totalOrder'].')';
    foreach($bests['image'] as $image)
     {
       ?>
    <div class="books2">
                	<a href="#"><img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$image['image_large'];?>" alt="Pen QURAN PAK" /></a>
                    <p><a href="#"><?php echo $pro_name.'('.$orders.')'; ?></a></p>
                </div>
       <?php
       break;
    }
}
?>
 </div>
       