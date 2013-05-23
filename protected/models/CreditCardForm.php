<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CreditCardForm extends CFormModel {

    public $first_name;
    public $last_name;
    public $card_number1;
    public $card_number2;
    public $card_number3;
    public $card_number4;
    public $card_type;
    public $cvc;
    public $exp_month;
    public $exp_year;
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('first_name, last_name ,card_number1,card_number2,
                            card_number3,card_number4,card_type,cvc,exp_month,exp_year,
                           ', 'required'),
            array('card_number1,card_number2,card_number3,card_number4', 'numerical', 'integerOnly' => true),
            array('card_number1,card_number2,card_number3,card_number4', 'length', 'max' => 4),
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

}
