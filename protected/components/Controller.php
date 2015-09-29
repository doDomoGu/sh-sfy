<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

	public $layout='//layouts/main';

	public $menu=array();

	public $breadcrumbs=array();

    public $navActived = false;

    public $titleChange = true;

    protected function beforeAction($action) {
        if(Yii::app()->controller->id == 'site'){
            if(Yii::app()->controller->action->id == 'index'){
                $this->navActived = 'site-index';
            }elseif(Yii::app()->controller->action->id == 'about'){
                $this->navActived = 'site-about';
            }elseif(Yii::app()->controller->action->id == 'contact'){
                $this->navActived = 'site-contact';
            }
        }

        //Yii::app()->clientScript->registerScriptFile('/js/jquery.SuperSlide.2.1.1.js',CClientScript::POS_END);


        //Yii::app()->bootstrap->register();
        return true;
    }

    protected function beforeRender($action){
        if($this->titleChange)
            $this->pageTitle = $this->pageTitle.' - '.Yii::app()->name;
        return true;
    }
}