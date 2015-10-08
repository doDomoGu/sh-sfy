<?php

class SettingController extends MyAdminController
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionImageBanner(){
        $this->breadcrumbs[] = array('n'=>'基本设置','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'banner图片','i'=>'','u'=>'');

        $criteria = new CDbCriteria;
        $criteria->order = 'status desc,ord desc';
        $list = ImageBanner::model()->findAll($criteria);
        $params['list'] = $list;
        $this->render('image_banner',$params);
    }

    public function actionImageBannerAdd(){
        $this->breadcrumbs[] = array('n'=>'基本设置','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'banner图片(列表)','i'=>'','u'=>'/admin/setting/imageBanner');
        $this->breadcrumbs[] = array('n'=>'banner图片(新建)','i'=>'','u'=>'');

        $model = new ImageBanner();

        //if(isset($_POST['ImageBannerForm']))
        if(!empty($_POST['form']))
        {
            $model->attributes = $_POST['form'];
            if($model->validate()){
                $model->save();
                Yii::app()->adminUser->setFlash('success','修改banner图片成功！');
                $this->redirect('/admin/setting/imageBanner');
                Yii::app()->end();
            }else{
                /*var_dump($model->getErrors());exit;*/
            }
        }

        $params['model'] = $model;

        $this->render('image_banner_add',$params);
    }


    public function actionImageBannerEdit(){
        $this->breadcrumbs[] = array('n'=>'基本设置','i'=>'','u'=>'');
        $this->breadcrumbs[] = array('n'=>'banner图片(列表)','i'=>'','u'=>'/admin/setting/imageBanner');
        $this->breadcrumbs[] = array('n'=>'banner图片(编辑)','i'=>'','u'=>'');
        $id = Yii::app()->request->getQuery('id');

        $model = ImageBanner::model()->findByPK($id);
        if($model!=NULL){
            if(!empty($_POST['form']))
            {
                $model->attributes = $_POST['form'];
                if($model->validate()){
                    $model->save();
                    Yii::app()->adminUser->setFlash('success','新增banner图片成功！');
                    $this->redirect('/admin/setting/imageBanner');
                    Yii::app()->end();
                }else{
                    /*var_dump($model->getErrors());exit;*/
                }
            }

            $params['model'] = $model;
            $this->render('image_banner_add',$params);
        }else{
            $error['error'] = '编辑banner图片时，指定ID不存在';
            $this->render('../site/error2',$error);
        }



    }


}