<div id="book_content">
    <div id="book_main_content">
        <?php $this->renderPartial("_subheader"); ?>
        <div id="left_main_content">
            <div id="check_boxes">
                <h1>Languages</h1>
                <?php
                $lang = new Language();
                $allLanguages = $lang->findAll();
                foreach ($allLanguages as $language) {
                    ?>
                    <div class="chek">
                        <?php echo CHtml::checkBox('checkbox') ?>
                        <span>
                            <?php echo $language->language_name ?>
                        </span>
                    </div>
                <?php } ?>

                <h1>Author</h1>
                <?php
                $models = Author::model()->findAll();
                $lstdata = CHtml::listData($models, 'author_id', 'author_name');
                echo CHtml::dropDownList('author_id', '', $lstdata, //not in action.....
                        array( 'options' => array('author_name' => array('selected' => true)),
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
                    <?php
                    foreach ($allCate as $allCatego) {
                        //CVarDumper::dump($allCate);die();
                        ?>
                        <li>
                            <?php
                            echo CHtml::link($allCatego->category_name, $this->createUrl('/web/product/allproducts'));
                            echo ' (' . $allCatego->totalStock . ')';
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div id="right_main_content">
            <?php
            foreach ($products as $product) {
                ?>
                <div class="condition">
                    <?php
                    echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/product_images/' . $product['image'][0]['image_large'], 'condition'), $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $product['product_id'])));
                    ?>
                    <h3>
                        <?php
                        echo CHtml::link($product['product_name'], $this->createUrl('/web/product/productDetail', array('country' => Yii::app()->session['country_short_name'], 'city' => Yii::app()->session['city_short_name'], 'city_id' => Yii::app()->session['city_id'], 'product_id' => $product['product_id'])));
                        ?>
                    </h3>
                    <p>Muhammad Manzoor Elahi</p>
                    <article>&dollar;<?php echo round($product['product_price'], 2); ?></article>
                </div>
            <?php } ?>
        </div>
    </div>
</div>