<?php
if ( function_exists('get_field') ) {
    $title  = get_sub_field('title');
    $text  = get_sub_field('text');
    $list  = get_sub_field('list');
}
?>

    <section class="licenses">
    <div class="container">
        <div class="licenses__head">
            <?php if(!empty($title)): ?>
                <h2><?=$title?></h2>
            <?php endif; ?>

            <?php if(!empty($text)): ?>
                <div class="licenses__head--desc">
                    <p> <?=$text?></p>
                </div>
            <?php endif; ?>

        </div>

        <?php if(!empty($list)): ?>
        <div class="licenses__images pswp-gallery pswp-gallery--single-column" id="gallery">
            <?php foreach ($list as $key=>$item):?>
                 <div class="licenses__images--item">
                     <?php
                    $photo =  $item['image'];
                    $photoBig = $item['image_big'];
                     ?>
                    <a href="<?=(!empty($photoBig) ? $photoBig : $photo)?>" data-pswp-width="400" data-pswp-height="590" data-pswp-srcset>
                        <figure>
                            <img data-pswp-srcset src="<?=$photo?>" alt="<?=bloginfo();?>" width="100%" height="100%">
                        </figure>
                    </a>

               <?php if(!empty($item['name'])): ?>
                   <h3><?=$item['name']?></h3>
                <?php endif; ?>

            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
</div>