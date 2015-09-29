<?php

class Contact extends CActiveRecord
{
    public function tableName()
    {
        return 'contact';
    }


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
            array('add_time','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
		);
	}

    public function phoneValidator($attribute){
        $phone = $this->$attribute;
        if(!preg_match('/^[0-9\-]*$/',$phone)){
            $this->addError($attribute, '联系电话不正确！');
        }
    }

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
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

    public function relations()
    {
        return array();
    }
}