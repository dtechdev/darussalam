<?php

class m130604_122812_add_relation_between_otherproducts_othercategory extends CDbMigration {

    public function up() {
        $table = "other_products_category";
        $this->addForeignKey("fk_region_other_product", $table, 'other_product_id', 'other_products', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey("fk_region_other_category", $table, 'category_id', 'others_category', 'id', 'CASCADE', 'CASCADE');
    }

    public function down() {
        $table = "other_products_category";
        $this->dropForeignKey("fk_region_other_product", $table);
        $this->dropForeignKey("fk_region_other_category", $table);
    }

}