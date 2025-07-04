<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patriot
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="tplArchive">
            <div class="container">
                <?php if ( have_posts() ) : ?>
                    <div class="tplArchive__header">
                        <?php if(get_post_type() =='specialists'): ?>
                            <h1>Наши специалисты</h1>
                        <?php else:?>
                            <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                        <?php endif;?>
                    </div>
                    <div class="grid-archive">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                         * Include the Post-Type-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                         */
                        if(get_post_type() =='specialists'):
                            get_template_part( 'template-loop/loop', get_post_type() );
                        else:
                            get_template_part( 'template-loop/loop', 'general' );
                       endif;
                    endwhile;
                    ?>
                    </div>

                   <?php

                    //the_posts_navigation();

                else :

                    get_template_part( 'content-parts/content', 'none' );

                endif;
                ?>
            </div>
        </div>


	</main>

<?php
//get_sidebar();
get_footer();
