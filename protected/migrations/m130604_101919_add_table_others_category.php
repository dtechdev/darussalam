<?php

class m130604_101919_add_table_others_category extends CDbMigration {

    public function up() {
        $table = 'others_category';
        $columns = array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'descriptions' => 'varchar(255) NOT NULL',
            'create_time' => 'datetime NOT NULL',
            'create_user_id' => 'int(11) unsigned NOT NULL',
            'update_time' => 'datetime NOT NULL',
            'update_user_id' => 'int(11) unsigned NOT NULL',
            'activity_log' => 'text',
            'PRIMARY KEY  (`id`)');
        $this->createTable($table, $columns);
    }

    public function down() {
        $table = 'others_category';
        $this->dropTable($table);
    }

}