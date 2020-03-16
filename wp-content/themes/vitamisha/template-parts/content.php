<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php vitamisha_post_thumbnail(); ?>

	<div class="entry-header">
		<div class="entry-meta">
			<span class="date_post"><?php the_time('F jS, Y'); ?></span>
		</div>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vitamisha' ),
			'after'  => '</div>',
		) );
		?>
	</div>

</article>
