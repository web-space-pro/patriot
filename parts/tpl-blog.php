<?php
if ( function_exists('get_field') ) {
    $title  = get_sub_field('title');
    $text  = get_sub_field('text');
    $link  = get_sub_field('link');
}
?>
    <section class="blog">
        <div class="container">
            <div class="blog__head">
                <?php if(!empty($title)): ?>
                    <h2 class="blog__title"><span><?=$title?></span></h2>
                <?php endif; ?>
                <?php if(!empty($text)): ?>
                    <div class="blog__content">
                        <?=$text; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="blog__loop">
                <?php
                $latest_posts = new WP_Query([
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if ( $latest_posts->have_posts() ) :
                    ?>
                    <div class="loop-posts">
                        <?php
                        while ( $latest_posts->have_posts() ) :
                            $latest_posts->the_post();
                            get_template_part( 'content-parts/content', get_post_type() );
                        endwhile;
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                else :
                    ?>
                    <p>Нет записей.</p>
                <?php
                endif;
                ?>
            </div>
            <?php if(!empty($link)) : ?>
                <div class="blog__link">
                    <a class="btn" href="<?=$link['url']?>" target="<?=$link['target']?>"><?=$link['title']?></a>
                </div>
            <?php endif; ?>
        </div>
    </section>