<?php

/**
 * This is the model class for table "wish_list".
 *
 * The followings are the available columns in table 'wish_list':
 * @property string $id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $city_id
 * @property string $added_date
 * @property string $session_id
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 * @property string $activity_log
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Product $product
 * @property City $city
 */
class WishList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WishList the static model class
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
		return 'wish_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id', 'required'),
			array('product_id, user_id, city_id', 'numerical', 'integerOnly'=>true),
			array('session_id', 'length', 'max'=>255),
			array('create_user_id, update_user_id', 'length', 'max'=>11),
			array('activity_log,create_time, create_user_id, update_time, update_user_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, product_id, user_id, city_id, added_date, session_id, create_time, create_user_id, update_time, update_user_id, activity_log', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'user_id' => 'User',
			'city_id' => 'City',
			'added_date' => 'Added Date',
			'session_id' => 'Session',
			'create_time' => 'Create Time',
			'create_user_id' => 'Create User',
			'update_time' => 'Update Time',
			'update_user_id' => 'Update User',
			'activity_log' => 'Activity Log',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('added_date',$this->added_date,true);
		$criteria->compare('session_id',$this->session_id,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('create_user_id',$this->create_user_id,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('update_user_id',$this->update_user_id,true);
		$criteria->compare('activity_log',$this->activity_log,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}