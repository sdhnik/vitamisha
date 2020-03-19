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

			<?php if ( is_page('kontakty') ) : ?>
				<div class="contacts-container">
					<?php the_content(); ?>
				</div>

				<div class="contact_form-container">
					<div class="contact_form-left">
						<iframe width="100%" height="100%" id="mapcanvas" src="https://maps.google.com/maps?q=вулиця+Дегтярівська,+27Т,+Київ,+Україна&amp;Roadmap&amp;z=17&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><div style="overflow:hidden;"><div id="gmap_canvas" style="height:100%;width:700px;"></div></iframe>
					</div>
					<div class="contact_form-right">
						<h2 class="h h--pink"><span>Контактная форма</span></h2>
						<p>Если у вас возникли вопросы, напишите нам!</p>
						<?php echo do_shortcode( '[contact-form-7 id="10" title="Contact form"]' ); ?>
					</div>
				</div>

			<?php elseif ( is_page('oplata-i-dostavka') ) : ?>
				<div class="o_i_d-container">
					<div class="o_i_d-left">
						<?php vitamisha_post_thumbnail(); ?>
					</div>
					<div class="o_i_d-right">
						<?php the_content(); ?>
					</div>
				</div>

				<div class="contact_form-container">
					<div class="contact_form-left">
						<iframe width="100%" height="100%" id="mapcanvas" src="https://maps.google.com/maps?q=вулиця+Дегтярівська,+27Т,+Київ,+Україна&amp;Roadmap&amp;z=17&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><div style="overflow:hidden;"><div id="gmap_canvas" style="height:100%;width:700px;"></div></iframe>
					</div>
					<div class="contact_form-right">
						<h2 class="h h--pink"><span>Контактная форма</span></h2>
						<p>Если у вас возникли вопросы, напишите нам!</p>
						<?php echo do_shortcode( '[contact-form-7 id="10" title="Contact form"]' ); ?>
					</div>
				</div>
			<?php else: ?>
				<?php vitamisha_post_thumbnail(); ?>

				<?php the_content(); ?>
			<?php endif; ?>			

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


