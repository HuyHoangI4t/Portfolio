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
<?php $brand_name = 'HuyHoang Portfolio'; ?>
<?php $current_path = isset( $_SERVER['REQUEST_URI'] ) ? untrailingslashit( sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) : ''; ?>
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
				<?php
				$link_path  = untrailingslashit( wp_parse_url( $url, PHP_URL_PATH ) );
				$is_current = $link_path === $current_path || ( home_url( '/' ) === $url && is_front_page() );
				?>
				<a href="<?php echo esc_url( $url ); ?>"<?php echo $is_current ? ' aria-current="page" class="is-current"' : ''; ?>><?php echo esc_html( $label ); ?></a>
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
