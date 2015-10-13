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
        $this->breadcrumbs[] = array('n'=>'活动列表','i'=>'','u'=>'/admin/activity/list');
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

    public function actionEdit(){
        $this->breadcrumbs[] = array('n'=>'活动列表','i'=>'','u'=>'/admin/activity/list');
        $this->breadcrumbs[] = array('n'=>'活动（编辑）','i'=>'','u'=>'');
        $id = Yii::app()->request->getQuery('id');

        $model = Activity::model()->findByPK($id);
        if($model!=NULL){
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','修改活动成功！');
                    $this->redirect('/admin/activity/list');
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;
            $this->render('add',$params);
        }else{
            $error['error'] = '编辑活动时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }
}