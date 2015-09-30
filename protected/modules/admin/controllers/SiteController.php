<?php

class SiteController extends MyAdminController
{
    public $layout='main2';
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else{
                $this->layout = 'application.modules.admin.views.layouts.main2';
				$this->render('error', $error);
            }
		}
	}

	public function actionLogin()
	{
        $this->pageTitle = '登录'.$this->adminTitleAdded;

        $this->layout = ' ';
        $model=new LoginAdminForm;
        if(isset($_POST['ajax']) && $_POST['ajax']==='login_admin-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['LoginAdminForm']))
        {
            //var_dump($_POST['LoginAdminForm']);exit;
            $model->attributes=$_POST['LoginAdminForm'];
            // validate user input and redirect to the previous page if valid
            if($ss = $model->validate() && $model->login()){
                if(Yii::app()->adminUser->returnUrl!='')
                    $this->redirect(Yii::app()->adminUser->returnUrl);
                else
                    $this->redirect('/admin');
            }
        }
        $params['model'] = $model;
        $params['error'] = Yii::app()->request->getQuery('error',null);
        $this->render('login',$params);
	}


    /*public function actionReg()
    {
        $this->pageTitle = '用户注册'.$this->adminTitleAdded;
        $this->layout = 'main_blank';
        $code = Yii::app()->request->getQuery('c',null);
        if($code !=null){
            $codeExist = RegInvite::model()->find('code ="'.$code.'" and del_flag = 0');
            if($codeExist!=null){
                if($codeExist->used_mid == 0){
                    $model = new RegForm;
                    if(isset($_POST['ajax']) && $_POST['ajax']==='reg-form')
                    {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                    }
                    if(isset($_POST['RegForm']))
                    {
                        $model->attributes=$_POST['RegForm'];
                        if($model->validate()){
                            $memberNew = new Member();
                            $memberNew->attributes = $model->attributes;
                            $memberNew->password = md5($model->password);
                            if($memberNew->save()){
                                //使其拥有“正式成员”权限
                                $auth = new Assignments();
                                $auth->itemname = '正式成员';
                                $auth->userid = $memberNew->id;
                                $auth->data = 's:0:"";';
                                $auth->save();

                                $codeExist->used_mid = $memberNew->id;
                                $codeExist->save();
                                //使变成已登录状态 并跳转至首页
                                $identity = new AdminUserIdentity($model->username,$model->password);
                                $identity->authenticate();
                                Yii::app()->adminUser->login($identity,3600);
                                Yii::app()->adminUser->setFlash('success','注册成功！');
                                $this->redirect('/admin');
                            }else{
                                Yii::app()->adminUser->setFlash('error','注册失败！');
                                $this->refresh();
                            }
                        }
                    }else{
                        $model->inviteCode = $code;
                    }
                    $params['model'] = $model;
                }else{
                    $params['wrong'] = '注册邀请码已被使用！';
                }
            }else{
                $params['wrong'] = '无效的注册邀请码';
            }
        }else{
            $params['wrong'] = '无效的注册链接';
        }

        $this->render('reg',$params);
    }*/

	public function actionLogout()
	{
	    $this->adminUser->logout();
		$this->redirect($this->adminUser->loginUrl);
	}



}