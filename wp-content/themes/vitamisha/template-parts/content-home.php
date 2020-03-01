<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

?>

<div class="home--seo__col">
	<div class="home--seo__photo">
		<?php vitamisha_post_thumbnail(); ?>
	</div>
</div>

<div class="home--seo__col home--seo__text">
	<?php the_content(); ?>
	<div class="home--seo__adminmeta">
		<?php if ( get_edit_post_link() ) : 
			edit_post_link(
				sprintf(
					wp_kses(
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
			endif;
		?>
	</div>
</div>
