<div style="height:400px;" class="text-center">
    <h3>首页内容</h3>
    <p class="lead"><span class="label label-warning">需要填写</span></p>
</div>
<div class="clearfix"></div>
<div id='act-list' class="text-center index-list">
    <h3>店铺活动</h3>
    <ul class="data-list list-unstyled">
        <?php $i=1;foreach($actList as $l):?>
            <li <?=$i%3==0?'class="last"':''?>>
                <img src="<?=$l->thumb?>" >
            </li>
            <?php $i++;endforeach;?>
    </ul>
</div>
<div class="clearfix"></div>
<div id='wedding-list' class="text-center index-list">
    <h3>婚纱相册</h3>
    <ul class="data-list list-unstyled">
        <?php $i=1;foreach($weddingList as $l):?>
            <li <?=$i%3==0?'class="last"':''?>>
                <a target="_blank" href="/photo/wedding?id=<?=$k?>">
                    <img src="<?=$l->thumb?>" >
                </a>
            </li>
            <?php $i++;endforeach;?>
    </ul>
</div>
<div class="clearfix"></div>
<div id='portrait-list' class="text-center index-list">
    <h3>写真相册</h3>
    <ul class="data-list list-unstyled">
        <?php $i=1;foreach($portraitList as $l):?>
            <li <?=$i%3==0?'class="last"':''?>>
                <a target="_blank" href="/photo/portrait?id=<?=$k?>">
                    <img src="<?=$l->thumb?>" >
                </a>
            </li>
            <?php $i++;endforeach;?>
    </ul>
</div>