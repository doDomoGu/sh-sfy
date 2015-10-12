<?php

class ActivityController extends MyAdminController
{
    public $defaultAction = 'list';

	public function actionList()
	{
        $this->breadcrumbs[] = array('n'=>'活动列表','i'=>'','u'=>'');

        $criteria = new CDbCriteria;
        $list = Activity::model()->findAll($criteria);
        $params['list'] = $list;
		$this->render('list',$params);
	}

    public function actionAdd(){
        $this->breadcrumbs[] = array('n'=>'活动列表','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'活动（新建）','i'=>'','u'=>'');

        $model = new Activity();
        $model->typeid = 1;
        if(!empty($_POST['form']))
        {
            $model->attributes = $_POST['form'];
            if($model->validate()){
                $model->save();
                Yii::app()->adminUser->setFlash('success','新增活动成功！');
                $this->redirect('/admin/activity/list');
                Yii::app()->end();
            }else{
                /*var_dump($model->getErrors());exit;*/
            }
        }

        $params['model'] = $model;

        $this->render('add',$params);
    }
}