<div id="book_content">
    <div id="book_main_content">
        <?php $this->renderPartial("_subheader"); ?>
        <div id="left_main_content">
            <div id="check_boxes">
                <h1>Languages</h1>
                <div class="chek">
                    <input type="checkbox"><span>Arabic</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>English</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>French</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>German</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Italian</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Russian</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Spanish</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Turkish</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Urdu</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Arabic</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>English</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>French</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>German</span>
                </div>
                <div class="chek">
                    <input type="checkbox"><span>Italian</span>
                </div>
                <h1>Author</h1>
                <?php
                $models = Author::model()->findAll();
                $lstdata = CHtml::listData($models, 'author_id', 'author_name');
                echo CHtml::dropDownList('author_id', '', $lstdata, //not in action.....
                        array(
                    'options' => array('author_name' => array('selected' => true)),
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => $this->createUrl('/web/product/editcart'),
                        'data' => array('quantity' => 'js:jQuery(this).val()', 'type' => 'update_quantity'),
                        'dataType' => 'json',
                        'success' => 'function(data) {
                                                            window.location.href=data.redirect
                                                           }',)
                ));
                ?>

            </div>
            <div id="category_list">
                <h2>VIEW BY CATEGORY</h2>
                <ul>
                    <li><a href="#">Aqeedah </a>(5,281)</li>
                    <li><a href="#">Biography </a>(35)</li>
                    <li><a href="#">Biography of the Prophet </a>(31)</li>
                    <li><a href="#">Children </a>(5,281)</li>
                    <li><a href="#">Fatawa </a>(35)</li>
                    <li><a href="#">Fiqh </a>(31)</li>
                    <li><a href="#">General </a>(5,281)</li>
                    <li><a href="#">Hadith </a>(75)</li>
                    <li><a href="#">History </a>(35)</li>
                    <li><a href="#">Islamic Culture </a>(31)</li>
                    <li><a href="#">Non-Muslim </a>(75)</li>
                    <li><a href="#">Other </a>(5,281)</li>
                    <li><a href="#">Packet or Set </a>(31)</li>
                    <li><a href="#">Qur'an </a>(75)</li>
                    <li><a href="#">Stories </a>(5,281)</li>
                    <li><a href="#">Supplication and Forgive </a>(5,281)</li>
                    <li><a href="#">Tafsir </a>(31)</li>
                    <li><a href="#">Women </a>(5,281)</li>
                    <li><a href="#">Worship </a>(75)</li>
                </ul>
            </div>
        </div>
        <div id="right_main_content">
            <?php
            foreach ($products as $product)
            {
                ?>
                <div class="condition">
                    <a href="<?php echo $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $product['product_id'])); ?>">
                        <?php
                        echo CHtml::image(Yii::app()->baseUrl . '/images/product_images/' . $product['image'][0]['image_large'], 'condition')
                        ?>
                    </a>
                    <h3><a href="<?php echo $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $product['product_id'])); ?>"><?php echo $product['product_name']; ?></a></h3>
                    <p>Muhammad Manzoor Elahi</p>
                    <article>&dollar;<?php echo round($product['product_price'], 2); ?></article>
                </div>
<?php } ?>
        </div>
    </div>
</div>