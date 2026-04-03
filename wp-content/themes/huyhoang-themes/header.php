<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
	<div class="container navbar">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">HuyHoang Portfolio</a>
		<nav class="nav-links" aria-label="Main Navigation">
			<?php foreach ( huyhoang_nav_items() as $url => $label ) : ?>
				<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</nav>
	</div>
</header>
<main>
