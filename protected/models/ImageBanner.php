<?php

class ImageBanner extends CActiveRecord
{
    public function tableName()
    {
        return 'image_banner';
    }


	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('title, img_url, link_url', 'required'),

            array('ord, status','numerical', 'integerOnly'=>true),

            array('style','safe'),

            array('add_time, edit_time','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
            array('edit_time','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'edit'),
		);
	}

	public function attributeLabels()
	{
		return array(
            'title'=>'标题',
            'img_url'=>'图片地址',
            'link_url'=>'链接地址',
            'ord'=>'排序',
            'status'=>'状态',
            'style'=>'样式',
			'add_time'=>'添加时间',
			'edit_time'=>'修改时间',
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
     * CREATE TABLE `image_banner` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `title` varchar(200) NOT NULL COMMENT '标题',
                    `img_url` varchar(255) NOT NULL COMMENT '图片地址',
                    `link_url` varchar(255) NOT NULL COMMENT '链接地址',
                    `ord` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序',
                    `style` varchar(255) NOT NULL DEFAULT '' COMMENT '额外样式',
                    `add_time` datetime NOT NULL,
                    `edit_time` datetime NOT NULL,
                    `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,逻辑删除标志位',
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    */
}