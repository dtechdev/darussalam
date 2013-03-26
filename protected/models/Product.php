<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $product_id
 * @property string $prouduct_name
 * @property integer $profile_id
 * @property integer $city_id
 * @property string $added_date
 * @property string $is_featured
 * @property string $product_price
 * @property integer $discount_id
 *
 * The followings are the available model relations:
 * @property Cart[] $carts
 * @property OrderDetail[] $orderDetails
 * @property ProductDiscount $discount
 * @property City $city
 * @property ProductCatagories[] $productCatagories
 * @property ProductImage[] $productImages
 * @property ProductProfile $productProfile
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('prouduct_name, profile_id, city_id, added_date, is_featured, product_price', 'required'),
			array('profile_id, city_id, discount_id', 'numerical', 'integerOnly'=>true),
			array('prouduct_name, added_date', 'length', 'max'=>255),
			array('is_featured', 'length', 'max'=>1),
			array('product_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, prouduct_name, profile_id, city_id, added_date, is_featured, product_price, discount_id', 'safe', 'on'=>'search'),
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
			'carts' => array(self::HAS_MANY, 'Cart', 'product_id'),
			'orderDetails' => array(self::HAS_MANY, 'OrderDetail', 'product_id'),
			'discount' => array(self::BELONGS_TO, 'ProductDiscount', 'discount_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'productCatagories' => array(self::HAS_MANY, 'ProductCatagories', 'product_id'),
			'productImages' => array(self::HAS_MANY, 'ProductImage', 'product_id'),
			'productProfile' => array(self::HAS_ONE, 'ProductProfile', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'prouduct_name' => 'Prouduct Name',
			'profile_id' => 'Profile',
			'city_id' => 'City',
			'added_date' => 'Added Date',
			'is_featured' => 'Is Featured',
			'product_price' => 'Product Price',
			'discount_id' => 'Discount',
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('prouduct_name',$this->prouduct_name,true);
		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('added_date',$this->added_date,true);
		$criteria->compare('is_featured',$this->is_featured,true);
		$criteria->compare('product_price',$this->product_price,true);
		$criteria->compare('discount_id',$this->discount_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}