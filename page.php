<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patriot
 */

get_header();
?>

	<main id="primary" class="site-main">
        <?php
        if ( function_exists('have_rows') ):
            while ( have_posts() ) :
            the_post();
            if ( have_rows('compotents' )  ) :
                while( have_rows('compotents') )
                {
                    the_row();
                    $layout = get_row_layout();
                    $inclusion = get_stylesheet_directory() . DIRECTORY_SEPARATOR . "parts" . DIRECTORY_SEPARATOR ."tpl-{$layout}.php";
                    if( file_exists( $inclusion ) )
                    {
                        include( $inclusion );
                    }
                }
            else:
                ?>
                <section class="simplePage">
                    <div class="container">
                        <?php get_template_part( 'content-parts/content', get_post_type() ); ?>
                    </div>
                </section>
            <?php
            endif;
        endwhile;
        else: ?>
            <section class="simplePage">
                <div class="container">
                    <?php get_template_part( 'content-parts/content', get_post_type() ); ?>
                </div>
            </section>
        <?php endif; ?>
	</main>

<?php
//get_sidebar();
get_footer();
