<?php

/**
 * This is the model class for table "catagories".
 *
 * The followings are the available columns in table 'catagories':
 * @property integer $catagory_id
 * @property string $catagory_name
 * @property string $added_date
 * @property integer $parent_id
 * @property integer $city_id
 *
 * The followings are the available model relations:
 * @property City $city
 * @property ProductCatagories[] $productCatagories
 */
class Catagories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Catagories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catagories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catagory_name, added_date, city_id', 'required'),
			array('parent_id, city_id', 'numerical', 'integerOnly'=>true),
			array('catagory_name, added_date', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('catagory_id, catagory_name, added_date, parent_id, city_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'productCatagories' => array(self::HAS_MANY, 'ProductCatagories', 'catagory_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'catagory_id' => 'Catagory',
			'catagory_name' => 'Catagory Name',
			'added_date' => 'Added Date',
			'parent_id' => 'Parent',
			'city_id' => 'City',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('catagory_id',$this->catagory_id);
		$criteria->compare('catagory_name',$this->catagory_name,true);
		$criteria->compare('added_date',$this->added_date,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('city_id',$this->city_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}