<?php
if ( function_exists('get_field') ) {
    $title  = get_sub_field('title');
    $list  = get_sub_field('list');
}
?>

<section class="information">
    <div class="container">
        <div class="information__head">
            <?php if(!empty($title)): ?>
                <h2><?=$title?></h2>
            <?php endif; ?>
        </div>

        <?php if(!empty($list)) : ?>
        <div class="information__facts">
            <?php foreach ($list as $key=>$item):?>
            <div class="information__facts--fact">
                <h4><?=$item['_title']?></h4>
                <p><?=$item['text']?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
