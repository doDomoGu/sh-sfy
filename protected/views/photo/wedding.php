<div id='wedding-list' class="text-center">
    <h3>婚纱作品</h3>
    <ul class="data-list list-unstyled">
        <?php $i=1;foreach($data as $k=>$d):?>
            <li <?=$i%3==0?'class="last"':''?>>
                <a target="_blank" href="/photo/wedding?id=<?=$k?>">
                    <img src="<?=$d['thumb']?>" >
                </a>
            </li>
        <?php $i++;endforeach;?>
    </ul>
</div>