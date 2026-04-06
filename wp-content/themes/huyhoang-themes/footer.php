<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$brand_name      = 'HuyHoang';
$brand_role      = 'Backend Developer | IT Student at Tay Nguyen University';
$public_facebook = 'https://facebook.com/hamm67';
$public_github   = 'https://github.com/HuyHoangI4t';
$public_email    = 'huyhoangpro187@gmail.com';
$owner_name      = 'Nguyễn Huy Hoàng';
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