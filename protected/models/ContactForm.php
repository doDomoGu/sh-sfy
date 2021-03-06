<?php

class ContactForm extends CFormModel
{
	public $name;
	public $phone;
	public $email;
	public $body;
	public $add_time;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, phone, body', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('phone', 'phoneValidator'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

    public function phoneValidator($attribute){
        $phone = $this->$attribute;
        if(!preg_match('/^[0-9\-]*$/',$phone)){
            $this->addError($attribute, '联系电话不正确！');
        }
    }

	public function attributeLabels()
	{
		return array(
            'name'=>'姓名',
            'phone'=>'联系电话',
            'email'=>'联系邮箱',
            'body'=>'备注内容',
			'verifyCode'=>'验证码',
		);
	}


}