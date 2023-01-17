<?php foreach ($category as $c): ?>
    <div style="border: 1px solid black">
        <h2><?=$c['title']?></h2>
        <a href="<?=route('category.show', ['id'=>$c['id']])?>">Далее</a>
    </div>
<?php endforeach; ?>
