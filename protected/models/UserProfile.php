<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $user_profile_id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $address
 * @property string $email
 * @property string $contact_number
 * @property string $date_of_birth
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserProfile extends CActiveRecord {
//    public $avatar;
//    public $date_of_birth;
//    public $address2;
//    public $zip_code;

    /**
     *
     * @var type 
     * uploaded path for image
     */
    public $uploaded_img = "";

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserProfile the static model class
     */
    public static function model($className = __CLASS__) {

        return parent::model($className);
    }

    public function __construct($scenario = 'insert') {
        $this->uploaded_img = Yii::app()->theme->baseUrl . "/images/talha_mujahid_img_03.png";
        parent::__construct($scenario);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user_profile';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, first_name, last_name', 'required'),
            array('avatar', 'file', 'types' => 'jpg, gif, png'),
            //array('user_id', 'numerical', 'integerOnly'=>true),
            array('first_name, last_name, address,  contact_number', 'length', 'max' => 255),
            array('id, first_name, last_name, address, gender, contact_number,city', 'safe'),
            array('avatar,date_of_birth,state_province,address_2,country,zip_code', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, first_name, last_name, address, gender, contact_number,city', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::BELONGS_TO, 'User', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'User Profile',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address' => 'Address',
            'city' => 'City',
            'gender' => 'Gender',
            'contact_number' => 'Contact Number',
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
        $criteria->compare('first_name', $this->first_name, true);
        $criteria->compare('last_name', $this->last_name, true);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('contact_number', $this->contact_number, true);
        $criteria->compare('city', $this->city, true);
        $criteria->compare('gender', $this->gender, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getFullName() {

        $firstN = $this->first_name;
        $lastN = $this->last_name;
        return $firstN . $lastN;
    }

    public function afterFind() {

        if (!empty($this->avatar)) {
            $this->uploaded_img = Yii::app()->baseUrl . "/uploads/user_profile/" . $this->user->primaryKey . "/" . $this->avatar;
        } else {
            $this->uploaded_img = Yii::app()->theme->baseUrl . "/images/talha_mujahid_img_03.png";
        }

        if (!empty($this->date_of_birth)) {
            $this->date_of_birth = DTFunctions::dateFormatForView($this->date_of_birth);
        }

        parent::afterFind();
    }

}