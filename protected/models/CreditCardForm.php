<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CreditCardForm extends CFormModel
{
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

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('first_name, last_name ,card_number1,card_number2,
                            card_number3,card_number4,card_type,cvc,exp_month,exp_year,
                            shipping_first_name, shipping_last_name,shipping_address1,shipping_country,
                            shipping_city, shipping_state, shipping_zip, shipping_phone', 'required'),
			// rememberMe needs to be a boolean
			//array('rememberMe', 'boolean'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			//'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password OR Activate your account');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
                        
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0;  // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
