<?php

class PhotoController extends MyAdminController
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionWedding(){
        $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'婚纱(列表)','i'=>'','u'=>'');

        $criteria = new CDbCriteria;
        $criteria->addCondition('typeid = '.Album::TYPEID_WEDDING);
        $criteria->order = 'status desc,ord desc';
        $list = Album::model()->findAll($criteria);
        $params['list'] = $list;
        $this->render('wedding',$params);
    }

    public function actionWeddingAdd(){
        $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'婚纱(列表)','i'=>'','u'=>'/admin/photo/wedding');
        $this->breadcrumbs[] = array('n'=>'婚纱(新建)','i'=>'','u'=>'');

        $model = new Album();
        $model->typeid = Album::TYPEID_WEDDING;
        if(!empty($_POST['form']))
        {
            $model->attributes = $_POST['form'];
            if($model->validate()){
                $model->save();
                Yii::app()->adminUser->setFlash('success','新增婚纱相册成功！');
                $this->redirect('/admin/photo/wedding');
                Yii::app()->end();
            }else{
                /*var_dump($model->getErrors());exit;*/
            }
        }

        $params['model'] = $model;

        $this->render('wedding_add',$params);
    }


    public function actionWeddingEdit(){
        $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'婚纱(列表)','i'=>'','u'=>'/admin/photo/wedding');
        $this->breadcrumbs[] = array('n'=>'婚纱(编辑)','i'=>'','u'=>'');
        $id = Yii::app()->request->getQuery('id');

        $model = Album::model()->findByPK($id);
        if($model!=NULL && $model->typeid == Album::TYPEID_WEDDING){
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','修改婚纱相册成功！');
                    $this->redirect('/admin/photo/wedding');
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;
            $this->render('wedding_add',$params);
        }else{
            $error['error'] = '编辑婚纱相册时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }
}