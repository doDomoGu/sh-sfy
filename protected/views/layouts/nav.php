<nav class="navbar navbar-inverse navbar-fixed-top nav-sfy">
    <div class="container">
        <div class="navbar-header">
            <!--<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>-->
            <a href="/" class="navbar-brand"><img src="/images/logo.png" /></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li <?php if($this->navActived=='site-index'):?> class="active" <?php endif;?>><a href="/">首页</a></li>
                <li <?php if($this->navActived=='photo-wedding'):?> class="active" <?php endif;?>><a href="/photo/wedding">婚纱作品</a></li>
                <li <?php if($this->navActived=='site-about'):?> class="active" <?php endif;?>><a href="/site/about">关于我们</a></li>
                <li <?php if($this->navActived=='site-contact'):?> class="active" <?php endif;?>><a href="/site/contact">联系我们</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div style="margin-bottom: 50px;"></div>