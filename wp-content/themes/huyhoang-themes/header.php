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
<?php $brand_name = function_exists( 'portfolio_get_config_value' ) ? portfolio_get_config_value( 'PORTFOLIO_BRAND_NAME', 'Portfolio' ) : 'Portfolio'; ?>
<header class="site-header">
	<div class="container navbar">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $brand_name ); ?></a>
		<button class="nav-toggle" type="button" aria-expanded="false" aria-controls="main-nav" aria-label="Mở menu">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<nav class="nav-links" id="main-nav" aria-label="Main Navigation">
			<?php foreach ( portfolio_nav_items() as $url => $label ) : ?>
				<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
			<?php endforeach; ?>
		</nav>
	</div>
</header>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var toggle = document.querySelector('.nav-toggle');
	var nav = document.getElementById('main-nav');

	if (!toggle || !nav) return;

	toggle.addEventListener('click', function () {
		var isOpen = nav.classList.toggle('is-open');
		toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
	});
});
</script>
<main>
