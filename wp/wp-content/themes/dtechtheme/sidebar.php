<div id="sidebar">
    <div class="web_button">
        <?php
        echo CHtml::link(CHtml::button('Visit darussalam.com', array('class' => 'visit_btn')), Yii::app()->createUrl('/site/storehome',array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'])),array('style' =>'cursor:pointer'));
        ?>
        <div class="small_images">
            <h1>Follow us</h1>
            <a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/f_img_03.jpg'); ?></a>
            <a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/t_img_03.jpg'); ?></a>
            <a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/subscriber_img_03.jpg'); ?></a>
        </div>
        <div class="like_us">
            <h1>Like us on Facebook</h1>
            <a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/f_114k_img_03.jpg'); ?></a>
        </div>
        <h1>Search blog posts</h1>
        <div class="search">
            <a href="#"><?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/search_img_03.jpg'); ?></a>
            <input type="text" class="search_text" />
        </div>
        <div class="sidebar_list">
            <h1>Categories</h1>
            <ul>
                <li><a href="#">Lorem ipsum dolor sit</a></li>
                <li><a href="#">Amet consectetur</a></li>
                <li><a href="#">Adipisicing elit</a></li>
                <li><a href="#">Sed do eiusmod</a></li>
                <li><a href="#">Tempor incididunt</a></li>
                <li><a href="#">Ut labore et dolore</a></li>
                <li><a href="#">Magna aliqua</a></li>
                <li><a href="#">Ut enim ad minim</a></li>
                <li><a href="#">Veniam, quis nostrud</a></li>
                <li><a href="#">Exercitation</a></li>
                <li><a href="#">Ullamco laboris nisi</a></li>
                <li><a href="#">Lorem ipsum dolor sit</a></li>
                <li><a href="#">Amet consectetur</a></li>
                <li><a href="#">Adipisicing elit</a></li>
                <li><a href="#">Sed do eiusmod</a></li>
                <li><a href="#">Tempor incididunt</a></li>
                <li><a href="#">Ut labore et dolore</a></li>
                <li><a href="#">Magna aliqua</a></li>
                <li><a href="#">Ut enim ad minim</a></li>
                <li><a href="#">Veniam, quis nostrud</a></li>
                <li><a href="#">Exercitation</a></li>
                <li><a href="#">Ullamco laboris nisi</a></li>
            </ul>
        </div>
        <div class="contact_us">
            <h1>Talk to us</h1>
            <li>Send blog feedback and suggestions to</li>
            <a href="#">blog@darussalam.com</a>
        </div>
    </div>
</div>