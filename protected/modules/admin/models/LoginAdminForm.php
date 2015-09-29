<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginAdminForm extends CFormModel
{
	public $name;
	public $password;
	public $rememberMe;

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
			array('name, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'name'  => '用户名',
            'password'  => '密码',
           // 'rememberMe'=>'保持登录状态',
           // 'checkNum'=>'检查登陆个数',
			'rememberMe'=> '下次自动登录',
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
			$this->_identity=new AdminUserIdentity($this->name,$this->password);
            $authCode = $this->_identity->authenticate();
            if($authCode == 11)
                $this->addError('name',Yii::t('login_reg','该用户被禁用！'));
            elseif($authCode>0)
				$this->addError('password',Yii::t('login_reg','用户名或密码错误！'));
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
			$this->_identity=new AdminUserIdentity($this->name,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===AdminUserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->adminUser->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
