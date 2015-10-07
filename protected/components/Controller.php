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

    public $banner = array();

    protected function beforeAction($action) {
        $this->navActived = Yii::app()->controller->id.'-'.Yii::app()->controller->action->id;

        /*if(Yii::app()->controller->id == 'site'){
            if(Yii::app()->controller->action->id == 'index'){
                $this->navActived = 'site-index';
            }elseif(Yii::app()->controller->action->id == 'about'){
                $this->navActived = 'site-about';
            }elseif(Yii::app()->controller->action->id == 'contact'){
                $this->navActived = 'site-contact';
            }
        }*/

        //Yii::app()->clientScript->registerScriptFile('/js/jquery.SuperSlide.2.1.1.js',CClientScript::POS_END);


        //Yii::app()->bootstrap->register();

        $criteria = new CDbCriteria;
        $criteria->addCondition('status = 1');
        $criteria->order = 'ord desc';
        $criteria->limit = 5;
        $this->banner = ImageBanner::model()->findAll($criteria);

        return true;
    }

    protected function beforeRender($action){
        if($this->titleChange)
            $this->pageTitle = $this->pageTitle.' - '.Yii::app()->name;
        return true;
    }
}