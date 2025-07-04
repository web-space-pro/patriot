<?php
if ( function_exists('get_field') ) {
    $title  = get_sub_field('title');
    $text_left  = get_sub_field('text_one');
    $text_right  = get_sub_field('text_two');
    $photo  = get_sub_field('image');
}
?>
<section class="hero" style="background-image: url('<?=$photo?>');">
    <div class="container">
        <?php if(!empty($title)): ?>
            <h1><?=$title?></h1>
        <?php endif; ?>

        <div class="hero__text">
            <?php if(!empty($text_left)): ?>
                <p data-parallax="200" data-parallax-mobile="20"><?=$text_left?></p>
            <?php endif; ?>
            <?php if(!empty($text_right)): ?>
                <p data-parallax="200" data-parallax-mobile="20"><?=$text_right?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
