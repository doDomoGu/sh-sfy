<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title><?=CHtml::encode($this->pageTitle)?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="/aceadmin/css/jquery-ui.css">
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/aceadmin/css/bootstrap.css">
    <link rel="stylesheet" href="/aceadmin/css/font-awesome.css">
    <!-- text fonts -->
    <link rel="stylesheet" href="/aceadmin/css/ace-fonts.css">
    <!-- ace styles -->
    <link rel="stylesheet" href="/aceadmin/css/ace.css" id="main-ace-style" class"ace-main-stylesheet">
    <!-- ace skin -->
    <link rel="stylesheet" href="/aceadmin/css/ace-skins.css">
    <!-- admin styles -->
    <link rel="stylesheet" href="/css/admin/style.css">



    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/aceadmin/css/ace-part2.css" class="ace-main-stylesheet">
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/aceadmin/css/ace-ie.css">
    <![endif]-->

    <!-- inline styles related to this page -->


    <!--[if !IE]> -->
    <?/*=$this->tag->javascriptInclude($ace_path."js/jquery.js")*/?>
    <!-- <![endif]-->

    <!--[if IE]> -->
    <?/*=$this->tag->javascriptInclude($ace_path."js/jquery1x.js")*/?>
    <![endif]-->
    <script src="/aceadmin/js/jquery1x.js"></script>
</head>
<body class="skin-1">
    <div id="navbar" class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-container" id="navbar-container">
            <div class="navbar-header pull-left">
                <a href="/" target="_blank" class="navbar-brand" style="padding-top:6px;padding-bottom: 2px;">
                    <!--<small>
                        菜苗网
                    </small>-->
                    <img src="/images/common/logo.png" style="height:36px;"/>
                </a>
            </div>
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                            <!--<img alt="Jason's Photo" src="../assets/avatars/user.jpg" class="nav-user-photo">-->
                                    $adminUser->realname （$adminUser->role->name）

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <!--<li>
                                <a href="#">
                                    <i class="ace-icon fa fa-cog"></i>
                                    Settings
                                </a>
                            </li>

                            <li>
                                <a href="profile.html">
                                    <i class="ace-icon fa fa-user"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="divider"></li>-->

                            <li>
                                <a href="/admin/index/logout">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main-container main-container-fixed" id="main-container">

        <?=$this->renderPartial("/layouts/siderbar") ?>

        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <?=$breadcrumbs?>
                    </ul>
                </div>

                <div class="page-content">
                    <?=$this->getContent()?>
                </div>
            </div>
        </div>

    </div>


    <?=$this->tag->javascriptInclude($ace_path."js/bootstrap.js")?>
    <?=$this->tag->javascriptInclude($ace_path."js/prettify.js")?>

    <?=$this->tag->javascriptInclude($ace_path."js/ace-extra.js")?>
    <?=$this->tag->javascriptInclude($ace_path."js/ace-elements.js")?>
    <?=$this->tag->javascriptInclude($ace_path."js/ace.js")?>

    <?=$this->tag->javascriptInclude($ace_path."js/jquery-ui.js")?>

<!-- 弹出提示框 -->

<div id="flash-message" class="hide"><?php $this->flashSession->output();?></div>
<script>
    $(function(){
        if($('#flash-message').html()!=''){
            $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
                _title: function(title) {
                    var $title = this.options.title || '&nbsp;'
                    if( ("title_html" in this.options) && this.options.title_html == true )
                        title.html($title);
                    else title.text($title);
                }
            }));
            $( "#flash-message" ).removeClass('hide').dialog({
                modal: true,
                title: "<div class='widget-header widget-header-small'><h4 class='smaller'> 提示信息</h4></div>",
                title_html: true,
                buttons: [
                    {
                        text: "关闭",
                        "class" : "btn btn-primary btn-minier",
                        click: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });
        }
    });
</script>
</body>
</html>
