<?php
/**
 *  Product side bar search
 *  here for product listing
 */
?>
<div id="left_main_content">

    <div id="category_list">
        <h2>VIEW BY CATEGORY</h2>
        <ul>
            <?php
            foreach ($allCate as $allCatego) {

                echo CHtml::openTag("li");
                echo CHtml::link($allCatego->category_name, $url, array('onclick' => '
                                            
                                                  dtech.updateProductListing("' . $url . '",$(this).attr("id"));  
                                                  
                                                return false;
                                        ', "id" => $allCatego->category_id));
                echo ' (' . $allCatego->totalStock . ')';
                echo CHtml::closeTag("/li");
            }
            if (!empty($allCate)) {
                echo CHtml::openTag("li");
                echo CHtml::link("All", $this->createUrl('/web/quran/allproducts'), array('onclick' => '
                                            
                                                  dtech.updateProductListing("' . $url . '","all");  
                                                  
                                                return false;
                                        ', "id" => "all"));
                echo CHtml::closeTag("/li");
            }
            ?>
        </ul>
    </div>
</div>