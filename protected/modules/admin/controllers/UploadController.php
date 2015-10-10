<?php

class UploadController extends MyAdminController
{
	public function actionGetUptoken(){
        $up=new qiniuUpload('sh-sfy');
        $upToken=$up->createtoken();
        echo json_encode(array('uptoken'=>$upToken));exit;
    }

}