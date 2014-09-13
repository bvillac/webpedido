<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
         
        private $_id;
        private $_username;
        //private $_password;
        public  $_rememberMe;
        
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/
		/*if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/
                //echo $this->username;
                $session = Yii::app()->getSession();
                $user= USUARIO::model()->find('LOWER(USU_NOMBRE)=?', array(strtolower($this->username)));

                $session->add('isuser', FALSE);
                
                if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($this->password!==$user->USU_PASSWORD)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
                else{
                    //yii::app()->user->_id;
                    $this->_id=$user->USU_ID;
                    $this->_username=$user->USU_NOMBRE;
                    $session->add('isuser', TRUE);
                    //$this->setState('CORREO', $user->CORREO);
                    //PARA USAR LAS VARIABLES DE SESSION
                    //yii::app()->user->CORREO;
                    //yii::app()->user->getState('CORREO');
                    $this->errorCode=self::ERROR_NONE;
                }
                
                $session->close();
                return $this->errorCode == self::ERROR_NONE;
                
	}
}