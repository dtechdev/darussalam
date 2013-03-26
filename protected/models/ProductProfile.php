<?php

/**
 * This is the model class for table "product_profile".
 *
 * The followings are the available columns in table 'product_profile':
 * @property integer $profile_id
 * @property string $product_type
 * @property integer $author_id
 * @property integer $language_id
 * @property string $isbn
 *
 * The followings are the available model relations:
 * @property Author $author
 * @property Language $language
 * @property Product $profile
 */
class ProductProfile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductProfile the static model class
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
		return 'product_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_type, author_id, language_id, isbn', 'required'),
			array('author_id, language_id', 'numerical', 'integerOnly'=>true),
			array('product_type, isbn', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profile_id, product_type, author_id, language_id, isbn', 'safe', 'on'=>'search'),
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
			'author' => array(self::HAS_ONE, 'Author', 'author_id'),
			'language' => array(self::HAS_ONE, 'Language', 'language_id'),
			'profile' => array(self::BELONGS_TO, 'Product', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profile_id' => 'Profile',
			'product_type' => 'Product Type',
			'author_id' => 'Author',
			'language_id' => 'Language',
			'isbn' => 'Isbn',
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

		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('product_type',$this->product_type,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('isbn',$this->isbn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}