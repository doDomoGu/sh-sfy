<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title><?=CHtml::encode($this->pageTitle)?></title>
    <?=$this->renderPartial('/layouts/baidutongji')?>
</head>
<body>
    <?=$this->renderPartial('/layouts/nav')?>
    <?=$this->renderPartial('/layouts/slider')?>

    <div class="container" id="page">


        <?php echo $content; ?>





    </div>
    <div class="clearfix"></div>
    <?=$this->renderPartial('/layouts/footer2')?>
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript">
        $(".banner-slide").slide({titCell: ".hd li", mainCell: ".bd ul", effect: "fold", autoPlay: true, delayTime: 700});
        $(".banner-slide").hover(function() {
            $(".banner-slide .prev").stop().fadeIn();
            $(".banner-slide .next").stop().fadeIn();
        }, function() {
            $(".banner-slide .prev").stop().fadeOut();
            $(".banner-slide .next").stop().fadeOut();
        });
    </script>
</body>
</html>
