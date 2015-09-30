<?php

class Admin extends CActiveRecord
{
	public function tableName()
	{
		return 'admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('username, password, name ', 'length', 'max'=>200),

		);
	}

	public function relations()
	{
		return array(
            /*'assign'=>array(self::HAS_ONE, 'Assignments', '','on'=>'assign.userid = t.id'),
            'article'=>array(self::HAS_MANY, 'Article', '','on'=>'article.mid = t.id'),
            'work'=>array(self::HAS_MANY, 'ProductMember', '','on'=>'work.mid = t.id'),*/

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => '用户名',
			'password' => '密码',
			'name' => '姓名',
		);
	}


    /*
     *
     * CREATE TABLE if NOT EXISTS `admin` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `username` varchar(50) NOT NULL,
                    `password` varchar(100) NOT NULL,
                    `name` varchar(100) NOT NULL,
                    `status` tinyint(1) NOT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE INDEX `username_UNIQUE` (`username`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}
