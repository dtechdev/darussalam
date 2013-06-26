<?php

class m130626_122219_updateRights extends DTDbMigration {

    public function up() {
        $this->truncateTable("authassignment");
        $this->truncateTable("authitem");
        $this->truncateTable("authitemchild");
        $this->truncateTable("rights");
        
        $sql = $this->readJsonData("darussalam_rights");
        $this->execute($sql);
    }

    public function down() {
        return true;
    }

}