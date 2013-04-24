<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_password
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $city_id
 * @property string $activation_key
 * @property string $is_active
 * @property integer $site_id
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property UserStatus $status
 * @property Site $site
 * @property UserRole $role
 * @property UserProfile[] $userProfiles
 * 
 * 
 */
class User extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */

    const LEVEL_CUSTOMER = 3, LEVEL_ADMIN = 2, LEVEL_SUPERADMIN = 1, LEVEL_UNKNOWN = 0;
    const WEAK = 0;
    const STRONG = 1;

    public $user_password2;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_password,user_email', 'required'),
            array('role_id, status_id, city_id, site_id', 'numerical', 'integerOnly' => true),
            array('user_password, activation_key', 'length', 'max' => 255),
            array('is_active', 'length', 'max' => 8),
            array('user_password2', 'compare', 'compareAttribute' => 'user_password'),
            //array('user_name', 'unique', 'message' => 'User Name already exists.'),
            array('user_email', 'email'),
            array('user_email', 'unique', 'message' => 'email already exists.'),
            array('user_password', 'passwordStrength', 'strength' => self::STRONG),
            array('join_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, user_password, role_id, status_id, city_id, activation_key, is_active, site_id', 'safe', 'on' => 'search'),
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
            'orders' => array(self::HAS_MANY, 'Order', 'user_id'),
            'status' => array(self::BELONGS_TO, 'UserStatus', 'status_id'),
            'site' => array(self::BELONGS_TO, 'Site', 'site_id'),
            'role' => array(self::BELONGS_TO, 'UserRole', 'role_id'),
            'userProfiles' => array(self::HAS_MANY, 'UserProfile', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'user_id' => 'User',
            'user_name' => 'User Name',
            'user_password' => 'User Password',
            'role_id' => 'Role',
            'status_id' => 'Status',
            'city_id' => 'City',
            'activation_key' => 'Activation Key',
            'is_active' => 'Is Active',
            'site_id' => 'Site',
            'user_email' => 'User Email',
            'join_date' => 'Registration date',
            'user_password2' => 'Repeated Password',
        );
    }

    static function getAccessLevelList($level = null)
    {
        $levelList = array(
            self::LEVEL_CUSTOMER => 'Customer',
            self::LEVEL_ADMIN => 'Administrator',
                //self::LEVEL_SUPERADMIN=> 'Superadmin',
                // self::LEVEL_UNKNOWN=> 'Unknown..'
        );
        if ($level === null)
            return $levelList;
        return $levelList[$level];
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('user_name', $this->user_name, true);
        $criteria->compare('user_password', $this->user_password, true);
        $criteria->compare('role_id', $this->role_id);
        $criteria->compare('status_id', $this->status_id);
        $criteria->compare('user_email', $this->status_id);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('activation_key', $this->activation_key, true);
        $criteria->compare('is_active', $this->is_active, true);
        $criteria->compare('site_id', $this->site_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     *  used to set the value for validation
     */
    public function beforeValidate()
    {
        if (empty($this->join_date))
        {
            $this->join_date = date("Y-m-d");
        }
        else
        {
            /** in case of form is filling this value * */
            $this->join_date = DTFunctions::dateFormatForSave($this->join_date);
        }

        parent::beforeValidate();
        return true;
    }

    public function beforeSave()
    {
        parent::beforeSave();
    }

    /**
     *  
     *  set the site confugrations
     *  like site id , city id
     *  plust activation key
     */
    public function setSiteConfigurations()
    {
        
    }

    public function validatePassword($password, $saved_password)
    {

        return md5($password) === $saved_password;
        //return $password;
    }

    public function passwordStrength($attribute, $params)
    {
        if ($params['strength'] === self::WEAK)
            $pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';
        elseif ($params['strength'] === self::STRONG)
            $pattern = '/^(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';

        if (!preg_match($pattern, $this->$attribute))
            $this->addError($attribute, 'Weak Password ! At least 5 characters.Passowrd can contain both letters and numbers!');
    }

}