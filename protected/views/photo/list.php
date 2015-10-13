<div id='photo-list' class="text-center">
    <h3><?=$this->pageTitle?></h3>
    <ul class="data-list list-unstyled">
        <?php $i=1;foreach($list as $l):?>
            <li <?=$i%3==0?'class="last"':''?>>
                <a target="_blank" href="/photo/<?=$typename?>/<?=$l->id?>">
                    <img src="<?=$l->thumb?>" >
                </a>
            </li>
        <?php $i++;endforeach;?>
    </ul>
</div>