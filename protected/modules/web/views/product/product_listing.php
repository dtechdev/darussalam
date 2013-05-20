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
                        <?php
                        echo CHtml::checkBox('checkbox', '', array(
                            "class" => "filter_checkbox",
                            "value" => $language->language_id,
                            "onclick" => '
                                  dtech.updateProductListing("' . $this->createUrl("/web/product/productfilter") . '","");
                               '
                        ))
                        ?>
                        <span>
                            <?php echo $language->language_name ?>
                        </span>
                    </div>
                <?php } ?>

                <h1>Author</h1>
                <?php
                $models = Author::model()->findAll();
                $lstdata = array("" => "All") + CHtml::listData($models, 'author_id', 'author_name');
                echo CHtml::dropDownList('author_id', '', $lstdata, //not in action.....
                        array('options' => array('author_name' => array('selected' => true)),
                    'onchange' => '
                        dtech.updateProductListing("' . $this->createUrl("/web/product/productfilter") . '","");
                        '
                ));
                ?>

            </div>
            <div id="category_list">
                <h2>VIEW BY CATEGORY</h2>
                <ul>
                    <?php
                    foreach ($allCate as $allCatego) {

                        echo CHtml::openTag("li");
                        echo CHtml::link($allCatego->category_name, $this->createUrl('/web/product/allproducts'), array('onclick' => '
                                            
                                                  dtech.updateProductListing("' . $this->createUrl("/web/product/productfilter") . '",$(this).attr("id"));  
                                                  
                                                return false;
                                        ', "id" => $allCatego->category_id));
                        echo ' (' . $allCatego->totalStock . ')';
                        echo CHtml::closeTag("/li");
                    }
                    if (!empty($allCate)) {
                        echo CHtml::openTag("li");
                        echo CHtml::link("All", $this->createUrl('/web/product/allproducts'), array('onclick' => '
                                            
                                                  dtech.updateProductListing("' . $this->createUrl("/web/product/productfilter") . '","");  
                                                  
                                                return false;
                                        ', "id" => "all"));
                        echo CHtml::closeTag("/li");
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div id="right_main_content">
            <?php $this->renderPartial("_product_list", array("products" => $products)) ?>
        </div>
    </div>
</div>