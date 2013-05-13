<?php

/**
 * This is the model class for table "product_profile".
 *
 * The followings are the available columns in table 'product_profile':
 * @property integer $id
 * @property integer $product_id
 * @property integer $item_code
 * @property integer $language_id
 * @property integer $discount_type
 * @property integer $discount_value
 * @property integer $language_id
 * @property string $isbn
 *
 * The followings are the available model relations:
 * @property Author $author
 * @property Language $language
 * @property Product $profile
 */
class ProductProfile extends DTActiveRecord {

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

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('size,language_id,item_code,product_id', 'required'),
            array('create_time,create_user_id,update_time,update_user_id', 'required'),
            array('activity_log', 'safe'),
            array('id,size,no_of_pages,binding,printing,paper,edition', 'safe'),
            array('discount_type,discount_type', 'safe'),
            array('isbn', 'length', 'max' => 255),
            array('language_id', 'UniqueLanguage'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('profile_id, author_id, isbn', 'safe', 'on' => 'search'),
        );
    }

    /**
     * 
     * @param type $attribute
     * @param type $params
     */
    public function UniqueLanguage($attribute, $params) {
        $languages = array();
        $total_childs = array();
        if (isset($_POST['ProductProfile'])) {
            $total_childs = $_POST['ProductProfile'];
            foreach ($_POST['ProductProfile'] as $pFile) {
                $languages[] = $pFile['language_id'];
            }
        }
        $languages = array_unique($languages);


        if (count($languages) > 0 && count($total_childs) != count($languages)) {
            echo "ali";
            $this->addError($attribute, "Language Must be unique");
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'profile' => array(self::BELONGS_TO, 'Product', 'product_id'),
            'productLanguage' => array(self::BELONGS_TO, 'Language', 'language_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'profile_id' => 'Profile',
            'product_id' => 'Product',
            'isbn' => 'Isbn',
            'no_of_pages' => '# Pages',
            'binding' => 'Binding',
            'printing' => 'Printing',
            'paper' => 'Paper',
            'discount_type' => 'Disc Type',
            'discount_value' => 'Disc Value',
            'language_id' => 'Language',
            'edition' => 'Edition',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('profile_id', $this->profile_id);
        $criteria->compare('isbn', $this->isbn, true);
        $criteria->compare('no_of_pages', $this->no_of_pages, true);
        $criteria->compare('binding', $this->binding, true);
        $criteria->compare('printing', $this->printing, true);
        $criteria->compare('paper', $this->paper, true);
        $criteria->compare('edition', $this->edition, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}