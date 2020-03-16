<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

?>

<div <?php post_class(); ?>>
	<div class="blog-post_wrapper">
		<div class="blog-post_media">
			<?php vitamisha_post_thumbnail(); ?>
		</div>
		<div class="blog-post_content">
			<div class="meta-wrapper">
				<span class="date_post"><?php the_time('F jS, Y'); ?></span>
			</div>
			<?php the_title( '<h3 class="blog-post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

			<div class="blog-post_meta-desc">

				<a href="<?= esc_url( get_permalink() ) ?>" class="button-read-more flaticon-footprint wgl-read-more_icon">Читать больше</a> 
			</div>
		</div>
	</div>
</div>
