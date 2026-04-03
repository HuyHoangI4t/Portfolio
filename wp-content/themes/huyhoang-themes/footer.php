<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
</main> <footer class="site-footer">
    <div class="container footer-content">
        <div class="footer-brand">
            <h3>HuyHoang<span>.dev</span></h3>
            <p>Backend Developer | IT Student at Tay Nguyen University</p>
        </div>

        <div class="footer-socials">
            <a href="https://facebook.com/hamm67" target="_blank" rel="noopener noreferrer" class="social-icon fb" title="Facebook">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://github.com/HuyHoangI4t" target="_blank" rel="noopener noreferrer" class="social-icon gh" title="GitHub">
                <i class="fa-brands fa-github"></i>
            </a>
            <a href="mailto:your-email@gmail.com" class="social-icon gmail" title="Gmail">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>

        <div class="footer-info">
            <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <strong>Nguyễn Huy Hoàng</strong>.</p>
            <p class="footer-tagline">Built with <i class="fa-solid fa-heart" style="color: #ef4444;"></i> and WordPress</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>