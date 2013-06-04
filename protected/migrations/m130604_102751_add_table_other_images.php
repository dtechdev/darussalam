<?php

class m130604_102751_add_table_other_images extends CDbMigration {

    public function up() {
        $table = 'others_images';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'image_small' => 'varchar(255) NOT NULL',
            'image_large' => 'varchar(255) NOT NULL',
            'is_default' => 'tinyint(11) NOT NULL',
            'other_products_id' => 'int(11)',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY  (`id`)');
        $this->createTable($table, $columns);
    }

    public function down() {
        $table = 'others_images';
        $this->dropTable($table);
    }

}