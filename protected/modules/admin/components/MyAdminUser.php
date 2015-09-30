<?php

class MyAdminUser extends CWebUser {

    public function getInfo() {
        if($this->getId()===null)
            return null;
        $re = Admin::model()->findByPk($this->getId());
        return $re;
    }
    public function getPwd() {
        if($this->getId()===null)
            return null;
        $re = Admin::model()->findByPk($this->getId());
        return $re->password;
    }

    public function afterLogin($fromCookie){
        setcookie("adminUid", $this->id, time()+3600*24*30,'/');
        $_COOKIE['adminUid'] = $this->id;
        $pwd = $this->getPwd();
        setcookie("adminPwd", $pwd, time()+3600*24*30,'/');
        $_COOKIE['adminPwd'] = $pwd;
    }

    public function afterLogout(){
        setcookie("adminUid", null, time()-1,'/');
        setcookie("adminPwd", null, time()-1,'/');
    }
}

?>