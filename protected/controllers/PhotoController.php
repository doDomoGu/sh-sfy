<?php

class PhotoController extends Controller
{
	public function actionWedding()
	{

        $id = Yii::app()->request->getQuery('id');

        $photoArr = array(
            1=> array(
                'title'=>'111',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
            2=> array(
                'title'=>'222',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
            3=> array(
                'title'=>'333',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
            4=> array(
                'title'=>'444',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
            5=> array(
                'title'=>'555',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
            6=> array(
                'title'=>'666',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
            7=> array(
                'title'=>'777',
                'thumb'=>'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                'images'=>array(
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_1-320x107.jpg',
                    'http://7xipd8.com1.z0.glb.clouddn.com/wp-content/uploads/2015/02/slider_3-320x107.jpg',
                )
            ),
        );

        if($id>0 && in_array($id,array_keys($photoArr))){
            //单个作品
            $data = $photoArr[$id];
            $this->pageTitle = $data['title'];

            $params['data'] = $data;
            Yii::app()->clientScript->registerCssFile('/css/photo-wedding-page.css');
            $this->render('wedding-page',$params);
        }else{
            //作品列表
            $this->pageTitle = '婚纱作品';
            $params['data'] = $photoArr;
            Yii::app()->clientScript->registerCssFile('/css/photo-wedding-list.css');
            $this->render('wedding',$params);
        }



	}


}