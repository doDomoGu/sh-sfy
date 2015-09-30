<?php

class ContactController extends MyAdminController
{
	public function actionIndex()
	{
        $this->breadcrumbs[] = array('n'=>'客户留言','i'=>'','u'=>'');
        $criteria = new CDbCriteria();
        $criteria->order = 'add_time desc';
        $list = Contact::model()->findAll($criteria);
        $params['list'] = $list;
		$this->render('index',$params);
	}

}