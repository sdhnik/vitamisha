<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitamisha
 */

?>

</main>

<footer class="footer">
	<div class="container footer--container">
		<div class="footer--col">
			<div class="footer--info__logo">
				<a href="/" class="logo--link">
					<span class="logo--face"><img src="<?= get_template_directory_uri() ?>/img/logo.svg" alt="Витамиша лого"></span>
					<span class="logo--text"><span class="logo--text__first">Вита</span>миша</span>
				</a>
			</div>
			<div class="footer--info__text">Наш интернет-магазин “Витамиша” всегда рад вам помочь в выборе правильных витаминов для здорового развития ваших детей</div>
			<div class="footer--info__social">
				<a href="/" class="footer--info__social-facebook" title="Витамиша Facebook"></a>
				<a href="/" class="footer--info__social-instagram" title="Витамиша Instagram"></a>
			</div>
		</div>
		<div class="footer--col">
			<div class="footer--contacts">
				<h3 class="footer--contacts__title">Наши контакты</h3>
				<div class="footer--contacts__address">г. Киев, <br>Дегтяревская, 27Т</div>
				<div class="footer--contacts__phone"><a href="tel:+380977370810">+38 (097) 737 08 10</a></div>
				<div class="footer--contacts__mail"><a href="mailto:vitamisha.buy@gmail.com">vitamisha.buy@gmail.com</a></div>
			</div>
		</div>
	</div>
	<div class="footer--copyright">
		<p>Copyright © <?= date('Y') ?> Витамиша. Все права защищены.</p>
	</div>
</footer>

<?php if(!is_page( 'cart' ) && !is_cart() && !is_page( 'checkout' ) && !is_checkout()) {
	if (is_active_sidebar('cart_widget')) : dynamic_sidebar('cart_widget'); endif;
} ?>

<?php wp_footer(); ?>

</body>
</html>
