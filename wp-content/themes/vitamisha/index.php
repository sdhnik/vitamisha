<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vitamisha
 */

get_header();
?>

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
					<a href="/" class="button button--orange">Заказать</a>
				</div>
				<div class="home--first__elements">
					<div class="home--first__sun"></div>
					<div class="home--first__balloon"></div>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
