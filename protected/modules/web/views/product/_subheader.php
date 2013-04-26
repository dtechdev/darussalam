<?php
/*
 * Sub header for pages
 * 
 */
?>
<div class="left_book_main_content">
    <a href="<?php echo $this->createUrl('/site/storehome', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])); ?>">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/darussalam-inner-logo.png", 'logo') ?>
    </a>
</div>
<div class="search_box">
    <?php echo CHtml::textField('textsearch', '', array("class" => "search_text", "placeholder" => "Search keywords or image by keywords...")) ?>
    <?php echo CHtml::button('', array("class" => "search_btn")) ?>
    <?php echo CHtml::image(Yii::app()->theme->baseUrl . "/images/searching_img_03.jpg", '', array("class" => "searching_img")) ?>
</div>
<nav>
    <ul>
        <li><a href="<?php echo $this->createUrl('/site/page', array('view' => 'about')) ?>">About Us</a></li>
        <li><a href="<?php echo $this->createUrl('/site/contact') ?>">Contact Us</a></li>
        <li><a href="#">Help</a></li>
    </ul>
</nav>