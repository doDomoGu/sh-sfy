<?php

class PhotoController extends Controller
{
	public function actionList()
	{
        $typename = Yii::app()->request->getQuery('typename');
        $typeid = Album::getTypeid($typename);
        if($typeid!=NULL){

            $criteria = new CDbCriteria;
            $criteria->addCondition('t.status = 1 and t.typeid = '.$typeid);
            $criteria->order = 't.ord desc';
            $list = Album::model()->findAll($criteria);
            $this->pageTitle = Album::getName($typeid,'cn').'相册';
            $params['list'] = $list;
            $params['typename'] = $typename;
            Yii::app()->clientScript->registerCssFile('/css/photo-list.css');
            $this->render('list',$params);
        }else{
            //$error['error'] = '相册类型ID['.$this->typeid.']不存在';
            $this->render('../site/error');
        }
	}

    public function actionPage(){
        $id = Yii::app()->request->getQuery('id');

        $criteria = new CDbCriteria();
        $criteria->addCondition('status = 1 and id = '.$id);
        $album = Album::model()->find($criteria);

        if($album){
            $criteria = new CDbCriteria();
            $criteria->addCondition('status = 1 and aid = '.$id);
            $criteria->order = 'ord desc, id desc';
            $images = AlbumImage::model()->findAll($criteria);
            $this->pageTitle = $album->title;
            $prarms['album'] = $album;
            $params['images'] = $images;
            Yii::app()->clientScript->registerCssFile('/css/photo-wedding-page.css');
            $this->render('wedding-page',$params);
        }else{
            $this->render('../site/error');
        }
    }


}