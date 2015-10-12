<div id="sidebar" class="sidebar sidebar-fixed">
<!--
    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>
            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>
            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>
    </div>
-->
    <ul class="nav nav-list">
        <li <?=$this->ctrAct=='site-index'?'class="active"':''?>>
            <a href="/admin">
                <i class="menu-icon fa fa-home"></i><span class="menu-text">后台首页</span><b class="arrow"></b>
            </a>
        </li>
        <li <?=$this->ctrAct=='contact-index'?'class="active"':''?>>
            <a href="/admin/contact">
                <i class="menu-icon fa fa-comment"></i><span class="menu-text">客户留言</span><b class="arrow"></b>
            </a>
        </li>
        <li <?=$this->ctrId=='setting'?'class="active"':''?>>
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">基本设置</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li <?=in_array($this->actId,array('imageBanner','imageBannerAdd','imageBannerEdit'))?'class="active"':''?>>
                    <a href="/admin/setting/imageBanner">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">banner图片</span>
                        <b class="arrow"></b>
                    </a>
                </li>
                <!--<li >
                    <a href="/admin/contact/list">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">内容</span>
                        <b class="arrow"></b>
                    </a>
                </li>
                <li >
                    <a href="/admin/contact/list">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">内容</span>
                        <b class="arrow"></b>
                    </a>
                </li>-->
            </ul>
        </li>
        <li <?=$this->ctrId=='photo'?'class="active"':''?>>
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-camera"></i>
                <span class="menu-text">摄影相册</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li <?=in_array($this->actId,array('list','add','edit','image','imageAdd','imageEdit')) && Yii::app()->request->getQuery('typeid')==Album::TYPEID_WEDDING?'class="active"':''?>>
                    <a href="/admin/photo/list?typeid=1">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">婚纱</span>
                        <b class="arrow"></b>
                    </a>
                </li>
                <li <?=in_array($this->actId,array('list','add','edit','image','imageAdd','imageEdit')) && Yii::app()->request->getQuery('typeid')==Album::TYPEID_PORTRAIT?'class="active"':''?>>
                    <a href="/admin/photo/list?typeid=2">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">写真</span>
                        <b class="arrow"></b>
                    </a>
                </li>
            </ul>
        </li>
        <li <?=$this->ctrId=='activity' && in_array($this->actId,array('list','add'))?'class="active"':''?>>
            <a href="/admin/activity">
                <i class="menu-icon fa fa-flag"></i><span class="menu-text">店铺活动</span><b class="arrow"></b>
            </a>
        </li>
    </ul>
</div>