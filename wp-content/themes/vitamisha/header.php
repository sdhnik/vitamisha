<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitamisha
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,900&display=swap&subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" href="<?= get_template_directory_uri() ?>/main.css">
</head>

<body <?php body_class(); ?>>

<header id="header" class="header">
	<div class="container header--container">
		<div class="header--mobile">
			<button id="header--mobile__toggle" class="header--mobile__toggle"><span></span></button>
		</div>
		<div class="header--logo">
			<a href="/" class="logo--link">
				<span class="logo--face"><img src="<?= get_template_directory_uri() ?>/img/logo.svg" alt="Витамиша лого"></span>
				<span class="logo--text"><span class="logo--text__first">Вита</span>миша</span>
			</a>
		</div>
		<div id="header-nav" class="header--nav">
			<?php build_menu('header'); ?>
		</div>
		<div class="header--buttons">
			<ul>
				<?php if(!is_page( 'cart' ) && !is_cart() && !is_page( 'checkout' ) && !is_checkout()) { ?>
				<li><a href="#" class="header--button header--buttons__cart"><i></i> <?php echo WC()->cart->get_cart_contents_count()>0 ? sprintf ( _n( '<span>%d</span>', '<span>%d</span>', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) : ''; ?></a></li>
				<?php } ?>
				<li class="header--buttons__search-container">
					<input id="search-toggle" class="header--buttons__search-input" type="checkbox">
					<label for="search-toggle" class="header--button header--buttons__search-toggle"><span></span></label>
					<form class="header--buttons__search-form" role="search" method="get" id="searchform"  action="<?php echo home_url( '/' ) ?>">
						<input type="search" value="<?php echo get_search_query() ?>" name="s">
						<input type="hidden" name="post_type" value="product">
						<button type="submit" id="searchsubmit" class="header--buttons__search"><i></i></button>
					</form>
				</li>
			</ul>
		</div>
	</div>

	<div class="header--mobile__container">
		<div class="header--mobile__overlay"></div>
		<div class="header--mobile__nav">
			<div class="header--mobile__actions">
				<div class="header--mobile__logo">
					<a href="/" class="logo--link">
						<span class="logo--face"><img src="<?= get_template_directory_uri() ?>/img/logo.svg" alt="Витамиша лого"></span>
						<span class="logo--text"><span class="logo--text__first">Вита</span>миша</span>
					</a>
				</div>
				<div class="header--mobile__close">
					<button id="header--mobile__close" class="header--mobile__close-button open"><span></span></button>
				</div>
			</div>
			<div class="header--mobile__links">
				<?php build_menu('header'); ?>

				<ul class="header--mobile__buttons">
					<li><a href="/my-account/" class="header--button header--buttons__account"><i></i></a></li>
					<?php if(!is_page( 'cart' ) && !is_cart() && !is_page( 'checkout' ) && !is_checkout()) { ?>
					<li><a id="cart-button" href="#" class="header--button header--buttons__cart"><i></i> <?php echo WC()->cart->get_cart_contents_count()>0 ? sprintf ( _n( '<span>%d</span>', '<span>%d</span>', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ) : ''; ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

</header>

<main id="main" class="main">
