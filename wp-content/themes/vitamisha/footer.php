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
				<a href="/" class="footer--logo">
					<img src="<?= get_template_directory_uri() ?>/img/logo--footer.svg" alt="Витамиша лого">
				</a>
			</div>
			<div class="footer--info__text">Наш интернет-магазин “Витамиша” всегда рад вам помочь в выборе правильных витаминов для здорового развития ваших детей</div>
			<div class="footer--info__social">
				<a href="/" class="footer--info__social-facebook">Витамиша facebook</a>
				<a href="/" class="footer--info__social-instagram">Витамиша instagram</a>
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
	<div class="container footer--copyright">
		<p>Copyright © <?= date('Y') ?> Витамиша. Все права защищены.</p>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
