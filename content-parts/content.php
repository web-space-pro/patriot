<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patriot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="gutenberg">
        <div class="entry-header">
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;


            ?>
        </div>
        <div class="wp-block-content">
            <?=get_the_content();?>
            <?php if ( 'post' === get_post_type() ) :?>
            <div class="entry-meta">
                <?php
                patriot_posted_on();
                patriot_posted_by();
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
