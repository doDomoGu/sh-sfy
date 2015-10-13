<?php

class PhotoController extends MyAdminController
{
    public $typeid;
    public $albumNamecn;

    public function beforeAction($action){
        if(parent::beforeAction($action)){
            $this->typeid = Yii::app()->request->getQuery('typeid');
            $this->albumNamecn = Album::getName($this->typeid,'cn');
            if($this->albumNamecn!=NULL){
                return true;
            }else{
                $error['error'] = '相册类型ID['.$this->typeid.']不存在';
                $this->render('../site/error2',$error);
                return false;
            }
        }else{
            return false;
        }
    }


	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionList(){
        $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(列表)','i'=>'','u'=>'');

        $criteria = new CDbCriteria;
        $criteria->addCondition('t.typeid = '.$this->typeid);
        $criteria->order = 't.status desc,t.ord desc';
        $list = Album::model()->with('images','images_true')->findAll($criteria);
        $params['list'] = $list;
        $params['typeid'] = $this->typeid;
        $params['albumNamecn'] = $this->albumNamecn;
        $this->render('list',$params);
    }

    public function actionAdd(){
        $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(列表)','i'=>'','u'=>'/admin/photo/list?typeid='.$this->typeid);
        $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(新建)','i'=>'','u'=>'');

        $model = new Album();
        $model->typeid = $this->typeid;
        if(!empty($_POST['form']))
        {
            $model->attributes = $_POST['form'];
            if($model->validate()){
                $model->save();
                Yii::app()->adminUser->setFlash('success','新增'.$this->albumNamecn.'相册成功！');
                $this->redirect('/admin/photo/list?typeid='.$this->typeid);
                Yii::app()->end();
            }else{
                /*var_dump($model->getErrors());exit;*/
            }
        }

        $params['model'] = $model;

        $this->render('add',$params);
    }


    public function actionEdit(){
        $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(列表)','i'=>'','u'=>'/admin/photo/list?typeid='.$this->typeid);
        $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(编辑)','i'=>'','u'=>'');
        $id = Yii::app()->request->getQuery('id');

        $model = Album::model()->findByPK($id);
        if($model!=NULL){
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','修改'.$this->albumNamecn.'相册成功！');
                    $this->redirect('/admin/photo/list?typeid='.$this->typeid);
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;
            $this->render('add',$params);
        }else{
            $error['error'] = '编辑'.$this->albumNamecn.'相册时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }

    public function actionImage(){
        $aid = Yii::app()->request->getQuery('aid');
        $album = Album::model()->findByPK($aid);
        if($album!=NULL){
            $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
            $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(列表)','i'=>'','u'=>'/admin/photo/list?typeid='.$this->typeid);
            $this->breadcrumbs[] = array('n'=>'图片管理 ('.$album->title.')','i'=>'','u'=>'');

            $criteria = new CDbCriteria;
            $criteria->addCondition('aid = '.$aid);
            $criteria->order = 'status desc,ord desc';
            $list = AlbumImage::model()->findAll($criteria);
            $params['list'] = $list;
            $params['album'] = $album;
            $this->render('image',$params);
        }else{
            $error['error'] = '进行'.$this->albumNamecn.'相册的图片管理时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }


    public function actionImageAdd(){
        $aid = Yii::app()->request->getQuery('aid');
        $album = Album::model()->findByPK($aid);
        if($album!=NULL){
            $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
            $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(列表)','i'=>'','u'=>'/admin/photo/list?typeid='.$this->typeid);
            $this->breadcrumbs[] = array('n'=>'图片管理('.$album->title.')','i'=>'','u'=>'/admin/photo/image?typeid='.$this->typeid.'&aid='.$aid);
            $this->breadcrumbs[] = array('n'=>'图片管理(新建)','i'=>'','u'=>'');

            $model = new AlbumImage();
            $model->aid = $aid;
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','新增['.$this->albumNamecn.'相册下一张图片]成功！');
                    $this->redirect('/admin/photo/image?typeid='.$this->typeid.'&aid='.$aid);
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;

            $this->render('image_add',$params);
        }else{
            $error['error'] = '进行'.$this->albumNamecn.'相册的图片管理时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }


    public function actionImageEdit(){
        $aid = Yii::app()->request->getQuery('aid');
        $album = Album::model()->findByPK($aid);
        if($album!=NULL){
            $this->breadcrumbs[] = array('n'=>'摄影相册','i'=>'','u'=>'');
            $this->breadcrumbs[] = array('n'=>$this->albumNamecn.'(列表)','i'=>'','u'=>'/admin/photo/list?typeid='.$this->typeid);
            $this->breadcrumbs[] = array('n'=>'图片管理('.$album->title.')','i'=>'','u'=>'/admin/photo/image?typeid='.$this->typeid.'&aid='.$aid);
            $this->breadcrumbs[] = array('n'=>'图片管理(编辑)','i'=>'','u'=>'');


            $aiid = Yii::app()->request->getQuery('aiid');
            $model = AlbumImage::model()->findByPK($aiid);
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','修改['.$this->albumNamecn.'相册下一张图片]成功！');
                    $this->redirect('/admin/photo/image?typeid='.$this->typeid.'&aid='.$aid);
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;

            $this->render('image_add',$params);
        }else{
            $error['error'] = '进行'.$this->albumNamecn.'相册的图片管理时，指定ID不存在';
            $this->render('../site/error2',$error);
        }
    }
}