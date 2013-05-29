<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $category_id
 * @property string $category_name
 * @property string $added_date
 * @property integer $parent_id
 * @property integer $city_id
 *
 * The followings are the available model relations:
 * @property City $city
 * @property ProductCategories[] $productCategories
 */
class Categories extends DTActiveRecord {

    public $totalStock;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Categories the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'categories';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name, added_date, city_id', 'required'),
            array('create_time,create_user_id,update_time,update_user_id', 'required'),
            array('activity_log', 'safe'),
            array('parent_id, city_id', 'numerical', 'integerOnly' => true),
            array('category_name, added_date', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('category_id, category_name, added_date, parent_id, city_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'getparent' => array(self::BELONGS_TO, 'Categories', 'parent_id'),
            'childs' => array(self::HAS_MANY, 'Categories', 'parent_id', 'order' => 'categories_id ASC'),
            'city' => array(self::BELONGS_TO, 'City', 'city_id'),
            'productCategories' => array(self::HAS_MANY, 'ProductCategories', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'category_name' => 'Category Name',
            'added_date' => 'Added Date',
            'parent_id' => 'Parent',
            'city_id' => 'City',
        );
    }

    /**
     * 
     * @return type
     */
    public function allCategories() {

        $criteriaC = new CDbCriteria(array(
            'select' => "COUNT(product_category_id ) as totalStock,t.category_id,t.category_name",
            'group' => 't.category_id',
            //'limit' => 14,
            'condition' => "t.city_id=" . Yii::app()->session['city_id'] . " AND product.city_id=" . Yii::app()->session['city_id'], //parent id = 0 means category that is parent by itself.show only parent category in list
            'order' => 'totalStock DESC',
        ));
        $cate = $this->with(array('productCategories' => array("select" => ""), 'productCategories.product' => array('alias' => 'product', 'joinType' => "INNER JOIN ", "select" => "")))->findAll($criteriaC);

        return $cate;
    }

    /**
     * get the array in keys segments
     * for footer of pages
     * @return type
     */
    public function getCategoriesInSegment($offset = 5) {
        $cats_temp = $this->allCategories();
        $cats = array();
        foreach ($cats_temp as $keycat => $cat) {
            $cats[$cat->category_id] = $cat->category_name;
        }
        $cats = array_chunk($cats, $offset, true);
        return $cats;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('category_name', $this->category_name, true);
        $criteria->compare('added_date', $this->added_date, true);
        $criteria->compare('parent_id', $this->parent_id);
        $criteria->compare('city_id', $this->city_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * 
     * get books by category for web service
     */
    public function getAllCategoriesForWebService() {

        $criteriaC = new CDbCriteria(array(
            'select' => "t.category_id,t.category_name",
            'group' => 't.category_id',
            'order' => 't.category_name ASC',
        ));
        $cate = $this->with(array('productCategories' => array("select" => ""), 'productCategories.product' => array('alias' => 'product', 'joinType' => "INNER JOIN ", "select" => "")))->findAll($criteriaC);
        return $cate;
    }

}