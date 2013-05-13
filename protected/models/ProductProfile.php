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
 * @property string $price
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
     * used to insert and upload images 
     * for every own profile
     * @var type 
     */
    public $upload_index;

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
            array('size,language_id,item_code', 'required'),
            array('item_code', 'unique'),
            array('create_time,create_user_id,update_time,update_user_id', 'required'),
            array('product_id,activity_log', 'safe'),
            array('id,size,no_of_pages,binding,printing,paper,edition,upload_index', 'safe'),
            array('price,discount_type,discount_type', 'safe'),
            array('isbn', 'length', 'max' => 255),
            array('language_id', 'UniqueLanguage'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('profile_id, author_id, isbn', 'safe', 'on' => 'search'),
        );
    }

    /**
     * Behaviour
     *
     */
    public function behaviors() {
        return array(
            'CSaveRelationsBehavior' => array(
                'class' => 'CSaveRelationsBehavior',
                'relations' => array(
                    'basicFeatures' => array("message" => "Please, fill required fields"),
                ),
            ),
            'CMultipleRecords' => array(
                'class' => 'CMultipleRecords'
            ),
        );
    }

    /**
     * 
     * @param type $attribute
     * @param type $params
     */
    public function UniqueLanguage($attribute, $params) {
        /** in case while creating new product * */
        if ($this->_controller == "product" && $this->_action == "create") {
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

                $this->addError($attribute, "Language Must be unique");
            }
        }
        /**
         * in case creating profiles using product
         */ else if ($this->_controller == "product" && $this->_action == "view") {
            $is_error = $this->getLangsLists();
            if ($is_error) {
                $this->addError($attribute, "Language Must be unique");
            }
        }
    }

    /**
     * langs list
     */
    public function getLangsLists() {



        if (!empty($_GET['id'])) {
            $criteria = new CDbCriteria();
            $criteria->select = "language_id";
            $criteria->addCondition("product_id=" . $_GET['id']);
            $criteria->addCondition("language_id=" . $this->language_id);
            if (!$this->isNewRecord) {

                $criteria->addCondition("id <>" . $this->id);
            }
            $product = ProductProfile::model()->findAll($criteria);
            if (!empty($product)) {
                return true;
            }
        }
        return false;
    }

    public function beforeValidate() {

        $this->makePosthildsProfile();
        return parent::beforeValidate();
    }

    /**
     * for making every profile childs
     */
    public function makePosthildsProfile() {

        if (isset($_POST['ProductImage'])) {

            
            
            $this->setRelationRecords('productImages', is_array($_POST['ProductImage'][$this->upload_index]) ? $_POST['ProductImage'][$this->upload_index] : array());
        }
        //die;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
            'productLanguage' => array(self::BELONGS_TO, 'Language', 'language_id'),
            'productImages' => array(self::HAS_MANY, 'ProductImage', 'product_profile_id', 'order' => 'is_default DESC'),
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
            'price' => 'Price',
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