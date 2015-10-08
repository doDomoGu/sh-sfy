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

    public function actionWeddingImage(){
        $aid = Yii::app()->request->getQuery('aid');
        $model = Album::model()->findByPK($aid);
        if($model!=NULL && $model->typeid == Album::TYPEID_WEDDING){
            $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
            $this->breadcrumbs[] = array('n'=>'婚纱(列表)','i'=>'','u'=>'/admin/photo/wedding');
            $this->breadcrumbs[] = array('n'=>'图片管理 ('.$model->title.')','i'=>'','u'=>'');

            $criteria = new CDbCriteria;
            $criteria->addCondition('aid = '.$aid);
            $criteria->order = 'status desc,ord desc';
            $list = AlbumImage::model()->findAll($criteria);
            $params['list'] = $list;
            $params['wedding'] = $model;
            $this->render('wedding_image',$params);
        }else{
            $error['error'] = '进行婚纱相册的图片管理时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }


    public function actionWeddingImageAdd(){
        $aid = Yii::app()->request->getQuery('aid');
        $album = Album::model()->findByPK($aid);
        if($album!=NULL && $album->typeid == Album::TYPEID_WEDDING){
            $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
            $this->breadcrumbs[] = array('n'=>'婚纱图片(列表)','i'=>'','u'=>'/admin/photo/wedding');
            $this->breadcrumbs[] = array('n'=>'图片管理('.$album->title.')','i'=>'','u'=>'/admin/photo/weddingImage?aid='.$aid);
            $this->breadcrumbs[] = array('n'=>'图片管理(新建)','i'=>'','u'=>'');

            $model = new AlbumImage();
            $model->aid = $aid;
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','新增[婚纱相册下一张图片]成功！');
                    $this->redirect('/admin/photo/weddingImage?aid='.$aid);
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;

            $this->render('wedding_image_add',$params);
        }else{
            $error['error'] = '进行婚纱相册的图片管理时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }


    public function actionWeddingImageEdit(){
        $aid = Yii::app()->request->getQuery('aid');
        $album = Album::model()->findByPK($aid);
        if($album!=NULL && $album->typeid == Album::TYPEID_WEDDING){
            $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
            $this->breadcrumbs[] = array('n'=>'婚纱图片(列表)','i'=>'','u'=>'/admin/photo/wedding');
            $this->breadcrumbs[] = array('n'=>'图片管理('.$album->title.')','i'=>'','u'=>'/admin/photo/weddingImage?aid='.$aid);
            $this->breadcrumbs[] = array('n'=>'图片管理(编辑)','i'=>'','u'=>'');


            $aiid = Yii::app()->request->getQuery('aiid');
            $model = AlbumImage::model()->find($aiid);
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','修改[婚纱相册下一张图片]成功！');
                    $this->redirect('/admin/photo/weddingImage?aid='.$aid);
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;

            $this->render('wedding_image_add',$params);
        }else{
            $error['error'] = '进行婚纱相册的图片管理时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }
}