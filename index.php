<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package patriot
 */

get_header();
?>

    <main id="primary" class="site-main">
        <div class="archive-page post-blocks-wrapper">
            <div class="container">
                <div class="archive-page__title">
                    <div class="page-header">

                        <?php
                        if ( is_home() && ! is_front_page() ) :
                            $blog_page_id = get_option('page_for_posts');
                            if ( $blog_page_id ) :
                                $blog_page = get_post($blog_page_id);
                                ?>
                                <h1 class="page-header__title">
                                    <?php echo get_the_title($blog_page_id); ?>
                                </h1>
                                <?php if ( ! empty( $blog_page->post_content ) ) : ?>
                                <div class="page-header__content">
                                    <?php echo apply_filters( 'the_content', $blog_page->post_content ); ?>
                                </div>
                            <?php endif; ?>
                            <?php
                            endif;

                        elseif ( is_archive() ) :
                            ?>
                            <h1 class="page-header__title"><?php the_archive_title(); ?></h1>

                        <?php elseif ( is_search() ) : ?>
                            <h1 class="page-header__title"><?php printf( __( 'Search results for: %s', 'tailpress' ), get_search_query() ); ?></h1>

                        <?php elseif ( is_404() ) : ?>
                            <h1 class="page-header__title"><?php _e( 'Page Not Found', 'tailpress' ); ?></h1>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="archive-page__content">
                    <?php
                    if ( have_posts() ) :
                        ?>
                        <div class="loop-posts">
                            <?php
                            while ( have_posts() ) :
                                the_post();
                                get_template_part( 'content-parts/content', get_post_type() );

                            endwhile;
                            ?>
                        </div>
                        <?php
                            the_posts_pagination([
                                'mid_size'  => 2,
                                'end_size'  => 1,
                                'prev_text' => '<span class="pagination__arrow pagination__arrow--prev"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M16.1141 17.3135C16.6285 17.8135 16.6285 18.6308 16.1141 19.1309C15.6077 19.6231 14.7925 19.623 14.286 19.1309L7.88563 12.9082C7.37146 12.4082 7.37146 11.5918 7.88563 11.0918L14.286 4.86914C14.7925 4.37703 15.6078 4.37688 16.1141 4.86914C16.6285 5.36921 16.6285 6.18644 16.1141 6.68652L10.6493 12L16.1141 17.3135Z" fill="white" /></svg></span>',
                                'next_text' => '<span class="pagination__arrow pagination__arrow--next"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M7.88588 6.68652C7.37153 6.18645 7.37154 5.36922 7.88588 4.86914C8.39227 4.37688 9.20753 4.37702 9.714 4.86914L16.1144 11.0918C16.6286 11.5918 16.6286 12.4082 16.1144 12.9082L9.71401 19.1309C9.20753 19.623 8.39227 19.6231 7.88588 19.1309C7.37153 18.6308 7.37154 17.8136 7.88588 17.3135L13.3507 12L7.88588 6.68652Z" fill="white" /></svg></span>',
                                'screen_reader_text' => ' ',
                            ]);

                    else :
                        get_template_part( 'content-parts/content', 'none' );
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
