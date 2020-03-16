<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vitamisha
 */

get_header();
?>

<div class="blog">
	<div class="blog--header">
		<h1 class="blog--header-title page-title">
			<?php 
				$categories = get_the_category(); 
				if ( ! empty( $categories ) ) echo esc_html( $categories[0]->name );
			?>
		</h1>
		<?php woocommerce_breadcrumb(); ?>
	</div>
	<div class="blog--content">
		<div class="container">
			<div class="blog--single">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
