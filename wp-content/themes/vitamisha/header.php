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
		<div class="header--logo">
			<a href="/" class="header--logo__link">
				<img src="<?= get_template_directory_uri() ?>/img/logo.svg" alt="Витамиша лого">
			</a>
		</div>
		<div id="header-nav" class="header--nav">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</div>
		<div class="header--buttons">
			<button class="header--button__toggle"><i></i></button>
			<button class="header--button__cart"><i></i></button>
			<button class="header--button__search"><i></i></button>
		</div>
	</div>
</header>

<main id="main" class="main">
