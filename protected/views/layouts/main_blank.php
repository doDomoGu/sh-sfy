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
    <div class="container" id="page">
        <?php echo $content; ?>
    </div>
    <div class="clearfix"></div>
    <?=$this->renderPartial('/layouts/footer2')?>
    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
