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

				<a href="<?= esc_url( get_permalink() ) ?>" class="button-read-more">Читать больше <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z" /></svg></a> 
			</div>
		</div>
	</div>
</div>
