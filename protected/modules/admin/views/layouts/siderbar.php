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
                <i class="menu-icon fa fa-users"></i><span class="menu-text">客户留言</span><b class="arrow"></b>
            </a>
        </li>
        <!--<li >
            <a href="javascript:void(0);" class="dropdown-toggle">
                <i class="menu-icon fa fa-pencil-square-o"></i>
                <span class="menu-text">内容管理</span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">
                <li >
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
                </li>
                <li >
                    <a href="/admin/contact/list">
                        <i class="menu-icon fa fa-caret-right"></i>
                        <span class="menu-text">内容</span>
                        <b class="arrow"></b>
                    </a>
                </li>
            </ul>
        </li>-->
    </ul>
</div>