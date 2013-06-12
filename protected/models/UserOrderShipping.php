<?php

/**
 * This is the model class for table "user_order_shipping".
 *
 * The followings are the available columns in table 'user_order_shipping':
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_id
 * @property string $shipping_prefix
 * @property string $shipping_first_name
 * @property string $shipping_last_name
 * @property string $shipping_address1
 * @property string $shipping_address2
 * @property string $shipping_country
 * @property string $shipping_state
 * @property string $shipping_city
 * @property integer $shipping_zip
 * @property string $shipping_phone
 * @property string $shipping_mobile
 * @property string $create_time
 * @property string $create_user_id
 * @property string $update_time
 * @property string $update_user_id
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property User $user
 */
class UserOrderShipping extends DTActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserOrderShipping the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_order_shipping';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, create_time, create_user_id, update_time, update_user_id', 'required'),
            array('user_id, order_id, shipping_zip', 'numerical', 'integerOnly' => true),
            array('shipping_prefix', 'length', 'max' => 3),
            array('shipping_first_name, shipping_last_name, shipping_address1, shipping_address2, shipping_country, shipping_state, shipping_city, shipping_phone, shipping_mobile', 'length', 'max' => 255),
            array('create_user_id, update_user_id', 'length', 'max' => 11),
            array('order_id', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, order_id, shipping_prefix, shipping_first_name, shipping_last_name, shipping_address1, shipping_address2, shipping_country, shipping_state, shipping_city, shipping_zip, shipping_phone, shipping_mobile, create_time, create_user_id, update_time, update_user_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'order_id' => 'Order',
            'shipping_prefix' => 'Shipping Prefix',
            'shipping_first_name' => 'Shipping First Name',
            'shipping_last_name' => 'Shipping Last Name',
            'shipping_address1' => 'Shipping Address1',
            'shipping_address2' => 'Shipping Address2',
            'shipping_country' => 'Shipping Country',
            'shipping_state' => 'Shipping State',
            'shipping_city' => 'Shipping City',
            'shipping_zip' => 'Shipping Zip',
            'shipping_phone' => 'Shipping Phone',
            'shipping_mobile' => 'Shipping Mobile',
            'create_time' => 'Create Time',
            'create_user_id' => 'Create User',
            'update_time' => 'Update Time',
            'update_user_id' => 'Update User',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('order_id', $this->order_id);
        $criteria->compare('shipping_prefix', $this->shipping_prefix, true);
        $criteria->compare('shipping_first_name', $this->shipping_first_name, true);
        $criteria->compare('shipping_last_name', $this->shipping_last_name, true);
        $criteria->compare('shipping_address1', $this->shipping_address1, true);
        $criteria->compare('shipping_address2', $this->shipping_address2, true);
        $criteria->compare('shipping_country', $this->shipping_country, true);
        $criteria->compare('shipping_state', $this->shipping_state, true);
        $criteria->compare('shipping_city', $this->shipping_city, true);
        $criteria->compare('shipping_zip', $this->shipping_zip);
        $criteria->compare('shipping_phone', $this->shipping_phone, true);
        $criteria->compare('shipping_mobile', $this->shipping_mobile, true);
        $criteria->compare('create_time', $this->create_time, true);
        $criteria->compare('create_user_id', $this->create_user_id, true);
        $criteria->compare('update_time', $this->update_time, true);
        $criteria->compare('update_user_id', $this->update_user_id, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}