<?php

class PhotoController extends Controller
{

	public function actionWedding()
	{
        $this->pageTitle = '婚纱作品';
        $this->render('wedding');
	}


}