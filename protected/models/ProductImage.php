<?php

/**
 * This is the model class for table "product_image".
 *
 * The followings are the available columns in table 'product_image':
 * @property integer $product_image_id
 * @property integer $product_id
 * @property string $image_title
 * @property string $image_small
 * @property string $image_large
 *
 * The followings are the available model relations:
 * @property Product $product
 */
class ProductImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductImage the static model class
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
		return 'product_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('product_id, image_small, image_large', 'required'),
			array('product_id', 'numerical', 'integerOnly'=>true),
			array('image_title, image_small, image_large', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_image_id, product_id, image_title, image_small, image_large', 'safe', 'on'=>'search'),
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
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_image_id' => 'Product Image',
			'product_id' => 'Product',
			'image_small' => 'Image Small',
			'image_large' => 'Image Large',
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

		$criteria->compare('product_image_id',$this->product_image_id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('image_small',$this->image_small,true);
		$criteria->compare('image_large',$this->image_large,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}