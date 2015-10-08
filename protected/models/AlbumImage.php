<?php

class AlbumImage extends CActiveRecord
{
    public function tableName()
    {
        return 'album_image';
    }

	public function rules()
	{
		return array(
			array('aid, title, img_url', 'required'),

            array('ord, status','numerical', 'integerOnly'=>true),

            array('add_time','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),

		);
	}

	public function attributeLabels()
	{
		return array(
            'aid'=>'相册id',
            'title'=>'标题',
            'img_url'=>'图片',
            'ord'=>'排序',
            'status'=>'状态',
			'add_time'=>'添加时间',
		);
	}

    public function relations()
    {
        return array();
    }

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /*
     *
     *
     * CREATE TABLE `album_image` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `aid` int(11) NOT NULL COMMENT '对应相册id',
                    `title` varchar(200) NOT NULL COMMENT '标题',
                    `img_url` varchar(255) NOT NULL DEFAULT '' COMMENT '图片地址',
                    `ord` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
                    `add_time` datetime NOT NULL,
                    `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,逻辑删除标志位',
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    */
}