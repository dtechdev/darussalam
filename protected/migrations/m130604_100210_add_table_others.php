<?php

class m130604_100210_add_table_others extends CDbMigration {

    public function up() {
        $table = 'other_products';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(255) NOT NULL',
            'descriptions' => 'varchar(255) NOT NULL',
            'price' => 'decimal(11) NOT NULL',
            'type' => 'enum("edu_toys","gifts","others") NOT NULL',
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
        $table = 'other_products';
        $this->dropTable($table);
    }

}