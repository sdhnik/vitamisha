<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

get_header();

if ( is_front_page() ): ?>

	<div class="home--first">
		<div class="home--first__blots">
			<div class="home--first__blot-blue"></div>
			<div class="home--first__blot-red"></div>
			<div class="home--first__blot-orange"></div>
		</div>
		<div class="container home--first__container">
			<div class="home--first__col">
				<div class="home--first__category">Привет! Я - Витамиша</div>
				<h1 class="home--first__title">Чтобы Ваш ребенок был здоров, активен и полон сил, Вам нужны наши витамины</h1>
				<div class="home--first__button">
					<a href="/" class="button button--orange">
						Заказать <i class="button--arrow"></i>
						<svg class="button--dashes button--dashes__white"><rect x="5px" y="5px" rx="25px" ry="25px" width="calc(100% - 10px)" height="calc(100% - 10px)"></rect></svg>
					</a>
				</div>
				<div class="home--first__elements">
					<div class="home--first__sun"></div>
					<div class="home--first__balloon"></div>
				</div>
			</div>
		</div>
	</div>

	<div class="home--beststayler">
		<div class="container">
			<h2 class="h h--pink"><span>Наши лучшие товары</span></h2>

			<div class="glide">
				<div data-glide-el="track" class="glide__track">
					<?php if (is_active_sidebar('beststayler')) : dynamic_sidebar('beststayler'); endif; ?>
				</div>
				<div class="glide__arrows" data-glide-el="controls">
					<button class="glide__arrow glide__arrow--left" data-glide-dir="<"></button>
					<button class="glide__arrow glide__arrow--right" data-glide-dir=">"></button>
				</div>
			</div>
		</div>
	</div>

	<div class="home--seo">
		<div class="container home--seo__container"> 

			<div class="home--seo__img">
				<div class="home--seo__img-balloon"></div>
				<div class="home--seo__img-rain"></div>
			</div>

			<?php 
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'home' );
				endwhile;
			?>

		</div>
	</div>

<?php else: ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
endif;

get_footer();
