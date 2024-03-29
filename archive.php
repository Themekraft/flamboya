<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _tk
 */
echo do_shortcode("[mbYTPlayer url='https://youtu.be/gMCVoUiyWxE' autoplay='true' mute='true' quality='default' ratio='auto' isinline='false' showcontrols='false' realfullscreen='true' printurl='true' loop='true' optimize_display='true' anchor='center,center' addraster='false' stopmovieonblur='false' remember_last_time='false' gaTrack='false' ]");
get_header(); ?>
achso
<div class="main-content">
    <div class="container">
        <div class="row">

            <div id="content" class="main-content-inner col-xs-12 <?php if ( get_theme_mod( 'larry_blog_archive_sidebars' ) == true ) { echo 'col-md-8'; } ?>">
				<?php do_action('show_beautiful_filters'); ?>
				<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>
                <div class="content-padder">

					<?php if ( have_posts() ) : ?>

                        <!--						<header>-->
                        <!--							<h1 class="page-title">-->
                        <!--								--><?php
//                  if  ( is_category() ) :
//										single_cat_title();
//
//									elseif ( is_tag() ) :
//										single_tag_title();
//
//									elseif ( is_author() ) :
//										/* Queue the first post, that way we know
//										 * what author we're dealing with (if that is the case).
//										*/
//										the_post();
//										printf( __( 'Author: %s', 'larry' ), '<span class="vcard">' . get_the_author() . '</span>' );
//										/* Since we called the_post() above, we need to
//										 * rewind the loop back to the beginning that way
//										 * we can run the loop properly, in full.
//										 */
//										rewind_posts();
//
//									elseif ( is_day() ) :
//										printf( __( 'Day: %s', 'larry' ), '<span>' . get_the_date() . '</span>' );
//
//									elseif ( is_month() ) :
//										printf( __( 'Month: %s', 'larry' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
//
//									elseif ( is_year() ) :
//										printf( __( 'Year: %s', 'larry' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
//
//									elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
//										_e( 'Asides', 'larry' );
//
//									elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
//										_e( 'Images', 'larry');
//
//									elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
//										_e( 'Videos', 'larry' );
//
//									elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
//										_e( 'Quotes', 'larry' );
//
//									elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
//										_e( 'Links', 'larry' );
//
//									else :
//										_e( 'Music', 'larry' );
//
//									endif;
//								?>
                        <!--							</h1>-->
                        <!--							--><?php
//								// Show an optional term description.
//								$term_description = term_description();
//								if ( ! empty( $term_description ) ) :
//									printf( '<div class="taxonomy-description">%s</div>', $term_description );
//								endif;
//							?>
                        <!--						</header><!-- .page-header -->-->

                        <div class="row">

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>


								<?php get_template_part( 'content-music-3-col', get_post_format() ); ?>

							<?php endwhile; ?>

							<?php _tk_content_nav( 'nav-below' ); ?>



                        </div>

					<?php else : ?>

						<?php get_template_part( 'no-results', 'archive' ); ?>

					<?php endif; ?>

                </div><!-- .content-padder -->
            </div>

			<?php if ( get_theme_mod( 'larry_blog_archive_sidebars' ) == true ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

			<?php get_footer(); ?>
