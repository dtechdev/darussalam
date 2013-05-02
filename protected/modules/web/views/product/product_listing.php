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
                            "class" => "filter_checkbox", "value" => $language->language_id))
                        ?>
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
                        array('options' => array('author_name' => array('selected' => true)),
                    'ajax' => array(
                        'type' => 'POST',
                        'url' => $this->createUrl('/web/product/editcart'),
                        'data' => array(
                            'quantity' => 'js:jQuery(this).val()',
                            'type' => 'update_quantity'
                        ),
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
                        ?>
                        <li>
                            <?php
                            echo CHtml::link($allCatego->category_name, $this->createUrl('/web/product/allproducts'), array('onclick' => '
                                            
                                                  $.ajax({
                                                    type: "POST",
                                                    url: "' . $this->createUrl("/web/product/productfilter") . '",
                                                    data: 
                                                    { 
                                                        cat_id: $(this).attr("id"),
                                                        ajax : 1,
                                                        author: $("#author_id").val(),
                                                        langs : dtech.getmultiplechecboxValue("filter_checkbox"),
                                                        
                                                    }
                                                    }).done(function( msg ) {
                                                    alert( "Data Saved: " + msg );
                                                });   
                                                return false;
                                        ', "id" => $allCatego->category_id));
                            echo ' (' . $allCatego->totalStock . ')';
                            ?>
                        </li>
<?php } ?>
                </ul>
            </div>
        </div>
        <div id="right_main_content">
<?php $this->renderPartial("_product_list", array("products" => $products)) ?>
        </div>
    </div>
</div>