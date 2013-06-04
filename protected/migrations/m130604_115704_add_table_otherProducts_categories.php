<?php

class m130604_115704_add_table_otherProducts_categories extends CDbMigration {

    public function up() {
        $table = 'other_products_category';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'other_product_id' => 'int(11)',
            'category_id' => 'int(11)',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY  (`id`)');
        $this->createTable($table, $columns);
    }

    public function down() {
        $table = 'other_products_category';
        $this->dropTable($table);
    }

}