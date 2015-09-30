<?php
/*
 * CMyController class file.
 * Extends CController and we can modify it for certain purpose
*/
class MyAdminController extends CController
{
    public $adminUser;
    public $adminInfo;
    public $adminUid;
    public $adminPwd;
    public $layout = 'main';
    public $inAjax;
    public $stash = array();
    public $breadcrumbs = array(array('n'=>'后台','i'=>'ace-icon fa fa-home home-icon','u'=>'/admin'));
    public $breadcrumb;
    public $adminTitleAdded = ' - 管理后台';
    public $jsVariables = array();
    public $ctrAct;

    protected function beforeAction($action)
    {
        if(parent::beforeAction($action)){
            //var_dump(Yii::app()->controller->id,Yii::app()->controller->action->id);
            $this->ctrAct = $this->id.'-'.$this->action->id;
            /*$agent = new MyBrowser();
            if($agent->isMobile()){
                $this->redirect('/mAdmin');
            }*/
            //setcookie("adminUid", '', time()-1,'/');
            //$_COOKIE['adminUid'] = 'sds12';
            $this->adminUser = Yii::app()->adminUser;
            $this->adminInfo = $this->adminUser->getInfo();
            $this->adminUid = isset($_COOKIE['adminUid'])?$_COOKIE['adminUid']:null;
            $this->adminPwd = isset($_COOKIE['adminPwd'])?$_COOKIE['adminPwd']:null;

            //var_dump($this->adminPwd);
            //var_dump($this->adminUser);exit;

            if(!in_array($this->id,array('site')) || ($this->id=='site' && $this->action->id=='index')){
                if($this->adminUser->isGuest || $this->adminUid==null){
                    $this->adminUser->returnUrl =  Yii::app()->request->url;
                    $this->redirect($this->adminUser->loginUrl);
                }
            }else{
                $this->adminUser->returnUrl =  $this->createUrl('/admin');
            }
            if($this->id == 'site' && $this->action->id=='login'
                && !$this->adminUser->isGuest && $this->adminUid!=null
            ){
                $this->redirect("/admin");
            }

            $thisPwd = $this->adminUser->getPwd();
            if($this->adminPwd!==null && $thisPwd !== $this->adminPwd && !($this->id == 'site' && $this->action->id=='logout')){
                $this->redirect("/admin/site/logout");
            }

            //Yii::app()->bootstrap->register();

            /*$script = new ModuleScriptInit();
            $script->scriptInitial();
            $this->addJsVar('adminUid',$this->adminUid);
            $this->addJsVar('WEBROOT_DIR',WEBROOT_DIR);
            $this->addJsVar('BASE_URL',BASE_URL);
            $this->addJsVar('UEDITOR_SAVE_FARM',UEDITOR_STORAGE_FARM);
            $this->addJsVar('DS_SHORTNAME',DuoshuoFun::SHORTNAME);
            $this->addJsVar('DS_SHORT',DuoshuoFun::SECRET);*/

            //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/js/jquery-1.9.1.js", CClientScript::POS_END);
            //var_Dump($this->adminUser->returnUrl);
            return true;
        }else{
            return false;
        }
    }
    protected function beforeRender($view){
        //$this->regJsVariable();
        $this->getBreadcrumb();
        return true;
    }
    
    public function renderError()
    {
        $this->render('/error');
        Yii::app()->end();
    }

    public function getBreadcrumb(){
        $breadcrumb = '';
        foreach($this->breadcrumbs as $b){
            $breadcrumb .='<li>';
            if(isset($b['i']) && $b['i']<>''){
                $breadcrumb .='<i class="'.$b['i'].'"></i>';
            }
            if(isset($b['u']) && $b['u']<>''){
                $breadcrumb .='<a href="'.$b['u'].'" >'.$b['n'].'</a>';
            }else{
                $breadcrumb .=$b['n'];
            }
            $breadcrumb .='</li>';
        }
        $this->breadcrumb = $breadcrumb;
    }

	/*public function changeSchema($schema_name)
    {
        try{        	
            Yii::app()->db->connectionString = preg_replace('/;dbname=[^;]*?;/',";dbname=$schema_name;",Yii::app()->db->connectionString);           
            Yii::app()->db->active = false; 
            Yii::app()->db->active = true;
        }
        catch(Exception $e){
            $this->redirect($this->createUrl('site/pages/view/error'));
            return false;
        }
        return true;
    }*/

    public function addJsVar($varname,$value){
        $arr = $this->jsVariables;
        $arr[$varname]=$value;
        $this->jsVariables = $arr;
        return $arr;
    }

    public function regJsVariable(){
        if(!empty($this->jsVariables)){
            $json = json_encode($this->jsVariables);
            $str = "var js_context = eval('(".$json.")');";
            Yii::app()->clientScript->registerScript('js_context',$str, CClientScript::POS_HEAD);
        }
    }

    public function addUeditor(){
        Yii::app()->clientScript->registerScriptFile('/js/ueditor/ueditor.config.custom.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile('/js/ueditor/ueditor.all.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile('/js/ueditor/lang/zh-cn/zh-cn.js', CClientScript::POS_END);
    }

}
