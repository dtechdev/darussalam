<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ShippingInfoForm extends CFormModel {

    public $shipping_prefix;
    public $shipping_first_name;
    public $shipping_last_name;
    public $shipping_address1;
    public $shipping_address2;
    public $shipping_country;
    public $shipping_city;
    public $shipping_state;
    public $shipping_zip;
    public $shipping_phone;
    public $payment_method;
    private $_identity;
    public $_states = array();

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('shipping_first_name, shipping_last_name,
                   shipping_address1,shipping_country,
                   shipping_city, shipping_state, shipping_zip, shipping_phone', 'required'),
            array('_states,payment_method', 'safe'),
                // rememberMe needs to be a boolean
                //array('rememberMe', 'boolean'),
                // password needs to be authenticated
                //array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
                //'rememberMe'=>'Remember me next time',
        );
    }

    public function beforeValidate() {

        $this->_states = $this->getStates();
        parent::beforeValidate();
        return true;
    }

    /**
     * get States for particular country
     */
    public function getStates() {
        $stateList = array();
        if (!empty($this->shipping_country)) {
            $stateList = Subregion::model()->findAll('region_id=' . $this->shipping_country);

            $stateList = CHtml::listData($stateList, 'code', 'name');
        }
        return $stateList;
    }

    /**
     * assign attribue before any action to
     * this form of current user
     */
    public function setAttributeByDefault() {
        $userinfo = UserProfile::model()->findByPk(Yii::app()->user->id);
        $this->shipping_first_name = $userinfo->shipping_first_name;
        $this->shipping_last_name = $userinfo->shipping_last_name;
        $this->shipping_address1 = $userinfo->shipping_address1;
        $this->shipping_address2 = $userinfo->shipping_address2;
        $this->shipping_country = $userinfo->shipping_country;
        $this->shipping_state = $userinfo->shipping_state;
        $this->shipping_city = $userinfo->shipping_city;
        $this->shipping_zip = $userinfo->shipping_zip;
        $this->shipping_phone = $userinfo->shipping_phone;
    }

}
