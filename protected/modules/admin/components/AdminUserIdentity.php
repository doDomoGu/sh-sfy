<?php
class AdminUserIdentity extends CUserIdentity
{
    private $_id;
    public $user;
    const ERROR_USER_DELETED = 11;
    const ERROR_USERNAME_INVALID = 12;
    const ERROR_PASSWORD_INVALID = 13;
    const ERROR_NONE = 0;
    public function authenticate($is_admin=null)
    {
        $admin = Member::model()->findByAttributes(array('username'=>$this->name));
        if($admin===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($admin->del_flag == 2)
            $this->errorCode=self::ERROR_USER_DELETED;
        else if($admin->del_flag == 0 || $admin->del_flag == 1){
            if(empty($admin->password) or $admin->password!==md5($this->password))
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else
            {
                //$this->setState('admin_last_login_time', $record->last_login_time);
                $this->errorCode=self::ERROR_NONE;
                $this->_id = $admin->id;
                $this->setUser($admin);
               /* if(!isset($is_admin) || !$is_admin){
                    $record->saveAttributes(array('last_login_time'=>date('Y-m-d H:i:s'),'login_times' => $record->login_times + 1));
                }*/
            }
        }
        unset($admin);
        return $this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(CActiveRecord $user)
    {
        $this->user=$user->attributes;
    }


   /* public function loginBack()
    {
        if($this->_identity===null)
        {
            $this->_identity=new AdminUserIdentity($this->name,$this->password);
            $this->_identity->authenticateBack();
        }
        if($this->_identity->errorCode===AdminUserIdentity::ERROR_NONE)
        {
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
            Yii::app()->adminUser->login($this->_identity,$duration);
            return true;
        }
        else
            return false;
    }*/

    public function authenticateBack()
    {
        $result = Member::model()->findByPK($this->name);
        if($result===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($result->del_flag == 2)
            $this->errorCode=self::ERROR_USER_DELETED;
        else
        {
            $this->_id = $result->id;
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode;
    }

    /*public function authenticateBack22()
    {
        $result = User::model()->findByPK($this->username);
        if($result===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($result->DEL_FLAG)
            $this->errorCode=self::ERROR_USER_DELETED;
        else
        {
            $this->_id = $result->ID;
            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode;
    }*/
}