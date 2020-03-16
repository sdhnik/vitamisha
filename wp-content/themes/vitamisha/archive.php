<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

get_header();
?>
<div class="blog">
	<div class="blog--header">
		<h1 class="blog--header-title page-title"><?php the_archive_title(); ?></h1>
		<?php woocommerce_breadcrumb(); ?>
	</div>
	<div class="blog--content">
		<div class="container">
			<div class="blog--list">
	<?php if ( have_posts() ) : ?>

		<?php

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'item' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;

?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
