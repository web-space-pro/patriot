<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package patriot
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="post-blocks-wrapper">
            <section class="simplePost">
                <div class="container">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'content-parts/content', 'single' );
                    endwhile;
                    ?>
                </div>
            </section>
            <?php
            // получаем 3 других поста того же типа
            $related_posts = new WP_Query([
                'post_type'      => get_post_type(),
                'posts_per_page' => 3,
                'post__not_in'   => [ get_the_ID() ],
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);

            if ( $related_posts->have_posts() ) :
                ?>
                <section class="related-posts">
                    <div class="container">
                        <h2 class="related-posts__title"><span>Читайте также</span></h2>
                        <div class="loop-posts">
                            <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                                <article class="loop-posts__item">
                                    <a href="<?php the_permalink(); ?>" class="loop-posts__link">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <div class="loop-posts__image">
                                                <?php the_post_thumbnail('medium', ['class' => 'related-posts__image']); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="loop-posts__content">
                                            <time class="loop-posts__date"><?php echo get_the_date('d.m.Y'); ?></time>
                                            <h3 class="loop-posts__title"><?php the_title(); ?></h3>
                                            <p class="loop-posts__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 12, '...' ); ?></p>
                                        </div>
                                    </a>
                                </article>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </section>
            <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </main>
<?php
get_footer();
