<?php

class Album extends CActiveRecord
{
    Const TYPEID_WEDDING = 1;

    public function tableName()
    {
        return 'album';
    }

	public function rules()
	{
		return array(
			array('title, thumb, typeid', 'required'),

            array('ord, status, typeid','numerical', 'integerOnly'=>true),

            array('describe','safe'),

            array('add_time, edit_time','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),

            array('edit_time','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
		);
	}

	public function attributeLabels()
	{
		return array(
            'title'=>'标题',
            'describe'=>'描述',
            'thumb'=>'缩略图',
            'typeid'=>'相册类型',
            'ord'=>'排序',
            'status'=>'状态',
			'add_time'=>'添加时间',
			'edit_time'=>'修改时间',
		);
	}

    public function relations()
    {
        return array(
            'images'=>array(self::HAS_MANY, 'AlbumImage', '','on'=>'images.aid = t.id'),
        );
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /*
     *
     *
     * CREATE TABLE `album` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `title` varchar(200) NOT NULL COMMENT '标题',
                    `describe` text COMMENT '简介/描述',
                    `typeid` tinyint(4) NOT NULL DEFAULT '1' COMMENT '相册类型',
                    `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
                    `ord` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
                    `add_time` datetime NOT NULL,
                    `edit_time` datetime NOT NULL,
                    `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,逻辑删除标志位',
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    */
}