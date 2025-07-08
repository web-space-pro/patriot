<article id="post-<?php the_ID(); ?>" <?php post_class('loop-posts__item'); ?>>
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
