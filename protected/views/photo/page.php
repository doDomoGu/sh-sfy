<div id='wedding-page' class="text-center">
    <h3><?=$album->title?></h3>
    <ul class="image-list list-unstyled">
        <?php foreach($images as $img):?>
        <li>
            <img src="<?=$img->img_url?>" >
        </li>
        <?php endforeach;?>
    </ul>
</div>