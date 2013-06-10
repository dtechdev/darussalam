<?php $this->renderPartial("_banner", array("model" => $model)); ?>
<div id="content">
    <div class="books_content">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/quran_without_color_07.png" /></a>
        <h1>Quran</h1>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
        <input type="button" value="Shop Now  >" class="shop_now_arrow" />
    </div>
    <div class="books_content">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/books_without_color_07.png" /></a>
        <h1>Books</h1>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
        <input type="button" value="Shop Now  >" class="shop_now_arrow" />
    </div>
    <div class="books_content">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/educational_toys_without_img_07.png" /></a>
        <h1>Educational Toys</h1>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
        <input type="button" value="Shop Now  >" class="shop_now_arrow" />
    </div>
    <div class="books_content">
        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/other_products_colorful_img_07.png" /></a>
        <h1>Other Products</h1>
        <p>Lorem ipsum color sit bla bla thhm ipoum deona eio a ea sho moxnt</p>
        <input type="button" value="Shop Now  >" class="shop_now_arrow" />
    </div>
    <div class="under_heading">
        <h2>Featured Books</h2>
        <img src="<?php echo Yii::app()->theme->baseUrl ?>/images/under_heading_07.png" />
    </div>
    <?php
    foreach ($product as $featured) {
        $name = $featured['product_name'];

        $image = $featured['no_image'];
        if (isset($featured['image'][0]['image_small'])) {
            $image = $featured['image'][0]['image_small'];
        }
        echo CHtml::openTag("div", array("class" => "featured_books",'style'=>'padding:28px 50px'));
        echo CHtml::link(CHtml::image($image, $name, array('style' => 'width:92px; height:138px;margin:0 0 17px 0px; box-shadow: 0 0 5px 5px #888; padding:2px 2px')), $this->createUrl('/web/product/productDetail', array('product_id' => $featured['product_id'])), array('title' => $name));
        echo CHtml::openTag("h3");
        echo CHtml::link(implode(' ', array_slice(explode(' ', $name), 0, 4)), $this->createUrl('/web/product/productDetail', array('product_id' => $featured['product_id'])));
        echo CHtml::closeTag("h3");
        echo CHtml::openTag("p");
        echo $featured['product_description'];
        echo CHtml::closeTag("p");
        echo CHtml::closeTag("div");
    }
    ?>
    <div class="under_content">
        <div class="left_under_content">
            <h4>Create An Account</h4>
            <p>You will Get A</p>
            <h5>$20 Discount</h5>
            <article>With a $100 or more purchase</article>
            <input type="button" value="Create Now  >" class="shop_now_arrow" />
        </div>
        <div class="middle_under_content">
            <p>Wondering what to give to your friends, Parents, wife, childern !</p>
            <h5>Its the Book</h5>
        </div>
        <div class="right_under_content">
            <h5>Bookshelf Favorites</h5>
            <h6>Save <span>up to</span> 50%</h6>
            <article>on Selected Books</article>
            <p>>Learn more</p>
        </div>
    </div>
</div>
