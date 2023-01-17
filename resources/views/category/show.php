<div style="border: 1px solid black">
    <h2><?=$category['title']?></h2>
</div>
<div>NEWS
<?php foreach ($news as $n):?>
        <?php if ($n['category_id'] == $category['id']):?>
            <div style="border: 1px solid black">
                <h3><?=$n['title']?></h3>
                <p><?=$n['description']?></p>
                <div><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong></div>
                <a href="<?=route('news.show', ['id'=>$n['id']])?>">Далее</a>
            </div>
        <?php endif;?>
<?php endforeach;?>
</div>
