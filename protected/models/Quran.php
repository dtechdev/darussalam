<?php

/**
 * Quran Category for all
 * 
 */
class Quran extends ProductProfile {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductProfile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }



    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_profile';
    }

}

?>
