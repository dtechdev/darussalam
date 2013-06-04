<?php

class m130604_114834_delete_cate_id_from_othersProduct_table extends CDbMigration {

    public function up() {
        $table = 'other_products';
        $column = 'category_id';
        $this->dropColumn($table, $column);
    }

    public function down() {
        $table = 'other_products';
        $column = 'category_id';
        $this->addColumn($table, $column, "int(11)");
    }

}