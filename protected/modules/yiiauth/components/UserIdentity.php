<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/*ERROR_NONE=0;
	ERROR_USERNAME_INVALID = 1;
	ERROR_PASSWORD_INVALID = 2;
	ERROR_UNKNOWN_IDENTITY = 100;
	
	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public function hybridauth($username)
	{
		$user=User::model()->find("user_name = '" . $username . "'");
		if ( $user === null ) 
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else
		{
			$this->_id = $user->id;
			$this->username = $user->username;
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode == self::ERROR_NONE;
	}
	
	public function authenticate()
	{
		$user=User::model()->find("user_name = '" . $this->username . "'");
		if ( $user === null ) 
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		
		else if ( !$user->validatePassword ( $this->password , $user->user_password ))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		
		else
		{
			$this->_id = $user->user_id;
			$this->username = $user->user_name;
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode == self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
}