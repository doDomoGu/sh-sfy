<div id='wedding-page' class="text-center">
    <h3><?=$data['title']?></h3>
    <ul class="image-list list-unstyled">
        <?php foreach($data['images'] as $imgUrl):?>
        <li>
            <img src="<?=$imgUrl?>" >
        </li>
        <?php endforeach;?>
    </ul>
</div>