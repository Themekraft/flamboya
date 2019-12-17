<?php
/**
 * @package _tk
 */

$options = get_option('fap_options');
$general_options = $options['general'];
$play_button_html = fap_decode_to_html($general_options['play_button_text']);


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_sticky() ) { ?>
		<div class="larry-sticky-pin">
			<i class="fa fa-bolt"></i>
			<i class="larry-sticky-triangle"></i>
		</div>
	<?php } ?>

	<div class="row">
		<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Read more">
					<?php if ( get_theme_mod( 'larry_blog_thumbnail_height' ) == fixed ) { ?>
						<div class="entry-content-thumbnail entry-content-thumbnail-grid hidden-xs" style="background: #000 url('<?php the_post_thumbnail_url( 'large' ); ?>') 0 0 scroll no-repeat; background-size: cover;">
						</div>
					<?php } ?>
					<div class="entry-content-thumbnail <?php if ( get_theme_mod( 'larry_blog_thumbnail_height' ) == fixed ) { ?>hidden-sm hidden-md hidden-lg<?php } ?>">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Read more"><?php the_post_thumbnail( 'large' ); ?></a>
					</div>
				</a>
		<?php } ?>

		<div class="entry-content-wrap col-xs-12">

			<header>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Read more"><?php the_title(); ?></a></h1>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<p class="readmore"><a class="btn btn-primary btn-small" title="Read More" href="<?php the_permalink(); ?>"><i class="fa fa-plus-circle"></i> &nbsp;Read More</a></p>

			 <footer class="entry-meta">

			<?php
			$url = get_post_meta(get_the_ID(), 'fap_track_url', true);
            echo do_shortcode('[fap_track url="'.$url.'" title="" share="" cover="" meta="" layout="button" enqueue=no auto_enqueue=no]');
			?>

             </footer>


		</div>
	</div><!-- .row -->
</article><!-- #post-## -->
