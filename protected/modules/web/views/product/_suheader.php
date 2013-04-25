<?php
/*
 * Sub header for pages
 * 
 */
?>
<div class="left_book_main_content">
    <a href="<?php echo $this->createUrl('/site/storehome', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])); ?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/darussalam-inner-logo.png" alt="logo" /></a>
</div>
<div class="search_box">
    <input type="text" placeholder="Search keywords or image ids..." value="" class="search_text" />
    <input type="button" name="" value="" class="search_btn" /><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/searching_img_03.jpg" class="searching_img" />
</div>
<nav>
    <ul>
        <li><a href="<?php echo $this->createUrl('/site/page', array('view' => 'about')) ?>">About Us</a></li>
        <li><a href="<?php echo $this->createUrl('/site/contact') ?>">Contact Us</a></li>
        <li><a href="#">Help</a></li>
    </ul>
</nav>