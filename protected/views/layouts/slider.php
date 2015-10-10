<div class="banner-slide">
    <div class="hd">
        <ul>
            <?php for($i=0;$i<count($this->banner);$i++):?>
            <li class=""></li>
            <?php endfor;?>
        </ul>
    </div>
    <div class="bd">
        <ul style="position: relative; width: 1920px; height: 550px;">
            <?php foreach($this->banner as $b):?>
            <li style="background: transparent url('<?=$b->img_url?>') no-repeat scroll center center; position: absolute; display: list-item;"><a target="_blank" href="<?=$b->link_url?>"></a></li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="center">
        <a href="javascript:void(0);" class="prev" ></a>
        <a href="javascript:void(0);" class="next" ></a>
    </div>
</div>

