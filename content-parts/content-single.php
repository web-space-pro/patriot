<?php
/**
 * * Template part for displaying posts
 * @package patriot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <?php if(has_post_thumbnail()): ?>
        <div class="post__thumbnail-container">
            <?php the_post_thumbnail('large', ['class' => 'post__thumbnail']); ?>
        </div>
    <?php endif; ?>
    <header class="post__header">
        <h1 class="post__title">
            <?php the_title(); ?>
        </h1>
        <?php if(! is_page()): ?>
            <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="post__date">
                <?php echo get_the_date(); ?>
            </time>
        <?php endif; ?>
    </header>
    <div class="post__content">
        <?php the_content(); ?>
    </div>
</article>
