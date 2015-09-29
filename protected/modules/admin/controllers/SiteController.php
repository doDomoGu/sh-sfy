<?php

class SiteController extends MyAdminController
{
    public $layout='main2';
    public $defaultAction = 'login';

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


    public function actionReg()
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
    }

	public function actionLogout()
	{
	    $this->adminUser->logout();
		$this->redirect($this->adminUser->loginUrl);
	}

    public function actionDsTest(){
        var_dump('sdsd');
        var_dump($_POST);exit;
        $url = "http://api.duoshuo.com/";
        $action = "threads/import";
        $data = array();
        $data['short_name'] = 'http://hsqt.dodomogu.com';
        $data['secret'] = 'c283fee1583c2cc5437c3134b210d817';
        $data['threads'] = array();
        $data['threads'][] = array(
            'thread_key' => 'work_1',
            'title' => 'wenzhang1',
            'url' => 'http://hsqt.dodomogu.com/work/1.html'
        );
        $data['threads'][] = array(
            'thread_key' => 'work_1',
            'title' => 'wenzhang2',
            'url' => 'http://hsqt.dodomogu.com/work/2.html'
        );
        $param = http_build_query($data, '', '&');

        echo $url.$action.'?'.$param;

        $ch = curl_init() ;
        curl_setopt($ch, CURLOPT_URL,$url.$action) ;
        curl_setopt($ch, CURLOPT_POST,8) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS,$param) ;
        $result = curl_exec($ch) ;
        var_dump($result);
        curl_close($ch) ;

    }

    public function actionDsTest2333(){
        /*if ($userId === null)
            $user = wp_get_current_user();
        elseif($userId != 0)
            $user = get_user_by( 'id', $userId);

        if (empty($user) || !$user->ID)
            return null;*/

        $token = array(
            'short_name'=>	DuoshuoFun::SHORTNAME,
            'user_key'	=>	'1',
            'name'		=>	'admin22',
        );

        echo  Jwt::encodeJWT($token, 'c283fee1583c2cc5437c3134b210d817');
    }

    public function actionDsTest2(){
        $url = "http://api.duoshuo.com/users/profile.json";
        $data = array('user_id'=>6460773);
        $param = http_build_query($data, '', '&');

        //echo $url.$action.'?'.$param;

        $ch = curl_init() ;
        curl_setopt($ch, CURLOPT_URL,$url.'?'.$param) ;
        /*curl_setopt($ch, CURLOPT_POST,8) ;*/
       // curl_setopt($ch, CURLOPT_POSTFIELDS,$param) ;
        $result = curl_exec($ch) ;
        var_dump($result);
        curl_close($ch) ;
    }


}