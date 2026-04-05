<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$get_config = function_exists( 'portfolio_get_config_value' )
    ? 'portfolio_get_config_value'
	: static function( $key, $default = '' ) {
		$env = getenv( $key );
		return false !== $env && '' !== (string) $env ? (string) $env : (string) $default;
	};

$brand_name      = $get_config( 'PORTFOLIO_BRAND_NAME', 'Portfolio' );
$brand_role      = $get_config( 'PORTFOLIO_BRAND_ROLE', 'Backend Developer | IT Student' );
$public_facebook = $get_config( 'PORTFOLIO_PUBLIC_FACEBOOK', 'https://facebook.com/your-profile' );
$public_github   = $get_config( 'PORTFOLIO_PUBLIC_GITHUB', 'https://github.com/your-username' );
$public_email    = $get_config( 'PORTFOLIO_PUBLIC_EMAIL', 'your-email@example.com' );
$owner_name      = $get_config( 'PORTFOLIO_OWNER_NAME', 'Your Name' );
?>
</main> <footer class="site-footer">
    <div class="container footer-content">
        <div class="footer-brand">
            <h3><?php echo esc_html( $brand_name ); ?><span>.dev</span></h3>
            <p><?php echo esc_html( $brand_role ); ?></p>
        </div>

        <div class="footer-socials">
            <a href="<?php echo esc_url( $public_facebook ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon fb" title="Facebook">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="<?php echo esc_url( $public_github ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon gh" title="GitHub">
                <i class="fa-brands fa-github"></i>
            </a>
            <a href="mailto:<?php echo esc_attr( $public_email ); ?>" class="social-icon gmail" title="Gmail">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>

        <div class="footer-info">
            <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <strong><?php echo esc_html( $owner_name ); ?></strong>.</p>
            <p class="footer-tagline">Built with <i class="fa-solid fa-heart" style="color: #ef4444;"></i> and WordPress</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>