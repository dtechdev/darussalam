<?php

/**
 * This is the model class for table "product_catagories".
 *
 * The followings are the available columns in table 'product_catagories':
 * @property integer $product_catagory_id
 * @property integer $product_id
 * @property integer $catagory_id
 *
 * The followings are the available model relations:
 * @property Catagories $catagory
 * @property Product $product
 */
class ProductCatagories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductCatagories the static model class
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
		return 'product_catagories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, catagory_id', 'required'),
			array('product_id, catagory_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_catagory_id, product_id, catagory_id', 'safe', 'on'=>'search'),
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
			'catagory' => array(self::BELONGS_TO, 'Catagories', 'catagory_id'),
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_catagory_id' => 'Product Catagory',
			'product_id' => 'Product',
			'catagory_id' => 'Catagory',
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

		$criteria->compare('product_catagory_id',$this->product_catagory_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('catagory_id',$this->catagory_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}