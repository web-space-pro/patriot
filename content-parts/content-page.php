<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patriot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="gutenberg">
        <div>
            <h1><?=the_title()?></h1>
        </div>
        <div class="wp-block-content">
            <?=get_the_content();?>
        </div>
    </div>
</article>
