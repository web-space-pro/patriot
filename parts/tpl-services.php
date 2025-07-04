<?php
if ( function_exists('get_field') ) {
    $title  = get_sub_field('title');
    $subtitle  = get_sub_field('subtitle');
    $link  = get_sub_field('link');
    $services  = get_sub_field('services');
}
?>
<div class="blocks-wrapper">

    <section id="services" class="services">
        <div class="container">
            <div class="services__head">
                <?php if(!empty($title)): ?>
                    <h2><?=$title?></h2>
                <?php endif; ?>

                <?php if(!empty($subtitle)): ?>
                    <div class="services__head--text">
                        <p><?=$subtitle?></p>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <?php if(!empty($services)) : ?>
        <div class="services__slider">
            <div class="slider-track">
                <?php foreach ($services as $key=>$item):?>
                <div class="slider-item">
                    <a data-title="<?=$item['title']?>"
                       data-description="<?=$item['text']?>"
                       data-price="<?=$item['price']?>"
                       data-modal="services-modal"
                       class="btn-modal-open open-service"
                       href="#">
                        <figure>
                            <img src="<?=$item['image']['url']?>" alt="<?=get_bloginfo();?>" width="100%" height="100%">
                        </figure>
                        <h3 class="slider-title"><?=$item['title']?></h3>
                    </a>
                </div>
                <?php endforeach; ?>
                <?php foreach ($services as $key=>$item):?>
                    <div class="slider-item">
                        <a data-title="<?=$item['title']?>"
                           data-description="<?=$item['text']?>"
                           data-price="<?=$item['price']?>"
                           data-modal="services-modal"
                           class="btn-modal-open open-service"
                           href="#">
                            <figure>
                                <img src="<?=$item['image']['url']?>" alt="<?=get_bloginfo();?>" width="100%" height="100%">
                            </figure>
                            <h3 class="slider-title"><?=$item['title']?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if(!empty($link)) : ?>
            <div class="services__btn">
                <a class="btn btn-modal-open" data-modal="contact-modal" href="<?=$link['url']?>" target="<?=$link['target']?>"><?=$link['title']?></a>
            </div>
        <?php endif; ?>
    </section>
