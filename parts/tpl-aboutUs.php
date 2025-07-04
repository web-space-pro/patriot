<?php
if ( function_exists('get_field') ) {
    $title  = get_sub_field('title');
    $Text  = get_sub_field('Text');
    $form  = get_sub_field('form');
    $form_title  = $form['title'];
    $form_text  = $form['text'];
    $form_contact  = $form['contact_form'];
}
?>
<section id="aboutus" class="aboutUs">
    <div class="container">
        <div class="aboutUs__wrap">
            <div class="aboutUs__left">
                <?php if(!empty($title)): ?>
                    <h2><?=$title?></h2>
                <?php endif; ?>

                <?php if(!empty($Text)): ?>
                    <div class="aboutUs__desc">
                        <?=$Text?>
                    </div>
                <?php endif; ?>

            </div>
            <div class="aboutUs__right">
                <div class="aboutUs__form">
                    <?php if(!empty($form_title)): ?>
                        <h3><?=$form_title?></h3>
                    <?php endif; ?>
                    <?php if(!empty($form_text)): ?>
                        <span class="sub"><?=$form_text?></span>
                    <?php endif; ?>

                    <?php if(!empty($form_contact)): ?>
                        <div>
                            <?= do_shortcode('[contact-form-7 id="'.$form_contact.'"]'); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>
