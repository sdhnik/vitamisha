<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

?>

<div id="post-<?php the_ID(); ?>" class="page">
	<div class="page--header">
		<h1 class="page--header__title page-title"><?php the_title(); ?></h1>
		<?php woocommerce_breadcrumb(); ?>
	</div>
	<div class="page--content">
		<div class="container">

			<?php vitamisha_post_thumbnail(); ?>

			<?php the_content(); ?>

			<?php if ( get_edit_post_link() ) : ?>
				<div class="page--footer entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'vitamisha' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>


