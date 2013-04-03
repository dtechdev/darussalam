
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?> - Customers Area</i></h1>
<b>Featured Books</b><br>
<?php
//echo Yii::app()->getBaseUrl(true);


foreach($product as $featured)
{
    //print_r($out);//$array['Slideshow']
    echo "<br>";
    echo $featured['product_name'];
    
    foreach($featured['image'] as $image)
     {
     echo "<p>";
       ?>
<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$image['image_small'];?>" width="50" height="50" />   
<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$image['image_large'];?>" width="250" height="150" />
       <?php
       break;

    }
    
}
?>

<hr> Best Selling Books<br>
<?php
foreach($best_sellings as $bests)
{
    //print_r($out);//$array['Slideshow']
    echo '<br>';
    echo $bests['product_name'];
     echo '('.$bests['totalOrder'].')';
    foreach($bests['image'] as $image)
     {
       ?>
<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$image['image_small'];?>" width="50" height="50" />   
<img src="<?php  echo Yii::app()->baseUrl.'/images/product_images/'.$image['image_large'];?>" width="250" height="150" />
       <?php
       break;

      echo "<hr>";
    }
    
}
?>

<br>Darussalam is a multilingual international Islamic publishing house, with headquarters in Riyadh, Kingdom of Saudi 
Arabia, and branches & agents in major cities of the world. <br>The foremost obligation of <br>TDarussalam is to publish most 
authentic Islamic books in the light of the Quran<br> and the Sahih Ahadith in all major international languages. 
<br>To impart and impel the above mentioned sacred obligation, <br>Darussalam has been engaged from its very inception,
in producing books on Islam<br> in the Arabic, English, Urdu, Spanish, French, Hindi, <br>Persian, Malayalam, Turkish, Indonesian, 
Russian, Albanian and Bangla<br> languages. The main theme of these books is to present the fundamentals of Islam as explained by 
the<br> most recognized Islamic scholars of the Muslim world.

The other main features of Darussalam as follows:<br>

Presenting books free from sectarianism and in accordance with the Quran and the Sunnah.
Producing books in concise, easy, lucid and comprehensive form.<br>
Keeping the prices of the books less than the global market prices.
Maintaining the quality of books according to <br>international standards.
Working to develop a better understanding of different schools of thought among the Muslims.<br>
Presenting books written by the most senior Islamic scholars and authors.
Editing of manuscripts by a board of senior editors.<br>
Supervising every stage of publication by a team of professional technical staff.
Catering to the needs of the<br> present-day problems faced by Muslims.<br>
Introducing educational devices for the learning of Quranic<br> teaching through computer technology.<br>
Abdul Malik Mujahid
Darussalam, Riyadh, KSA</p>