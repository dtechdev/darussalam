<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="logo">
    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/logo_img_03.png" /></a>
</div>
<div class="search_with_box">
    <div id="search-box">
        <form action='/search' id='search-form' method='get' target='_top'>
            <button id='search-button' type='submit'><span>Search</span></button>
            <input id='search-text' name='q' placeholder='type here' type='text'/>
            <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/search_03.png" />
        </form>
    </div>
</div>

<div class="cart_part">
    <div class="add_to_cart">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/shopping_cart_03.png" /></a>
    </div>
    <div class="wishlist">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/wishlist_img_03.png" /></a>
    </div>
</div>
<?php echo $content; ?>
<?php $this->endContent(); ?>