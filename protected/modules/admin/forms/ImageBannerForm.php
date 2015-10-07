<?php

class ImageBanne22rForm extends CFormModel
{
	public $title;
	public $img_url;
	public $link_url;
	public $ord;
	public $style;
	public $status;

	public function rules()
	{
		return array(
			array('title, img_url, link_url, ord, status', 'required'),
			array('ord, status','numerical', 'integerOnly'=>true),
            array('style','safe'),
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
		);
	}


}
