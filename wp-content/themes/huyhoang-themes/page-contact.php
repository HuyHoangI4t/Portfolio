<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_status = isset( $_GET['contact_status'] ) ? sanitize_key( wp_unslash( $_GET['contact_status'] ) ) : '';
$form_action    = esc_url( admin_url( 'admin-post.php' ) );

$get_config = function_exists( 'portfolio_get_config_value' )
	? 'portfolio_get_config_value'
	: static function( $key, $default = '' ) {
		$env = getenv( $key );
		return false !== $env && '' !== (string) $env ? (string) $env : (string) $default;
	};

$public_email    = $get_config( 'PORTFOLIO_PUBLIC_EMAIL', 'your-email@example.com' );
$public_phone    = $get_config( 'PORTFOLIO_PUBLIC_PHONE', '0000000000' );
$public_address  = $get_config( 'PORTFOLIO_PUBLIC_ADDRESS', 'Your Address' );
$public_github   = $get_config( 'PORTFOLIO_PUBLIC_GITHUB', 'https://github.com/your-username' );
$public_facebook = $get_config( 'PORTFOLIO_PUBLIC_FACEBOOK', 'https://facebook.com/your-profile' );
$map_embed       = $get_config( 'PORTFOLIO_PUBLIC_MAP_EMBED', 'https://www.google.com/maps' );

$public_phone_href = preg_replace( '/[^0-9+]/', '', $public_phone );

get_header();
?>
<section class="page-section contact-page">
	<div class="container">
		<div class="contact-head card">
			<h2>Liên hệ</h2>
		</div>

		<div class="contact-layout">
			<div class="card contact-card contact-card--info">
				<h3>Thông tin liên hệ</h3>
				<ul class="contact-items">
					<li><span>✉️</span>
						<div><strong>Email</strong><a href="mailto:<?php echo esc_attr( $public_email ); ?>"><?php echo esc_html( $public_email ); ?></a></div>
					</li>
					<li><span>📞</span>
						<div><strong>SĐT</strong><a href="tel:<?php echo esc_attr( $public_phone_href ); ?>"><?php echo esc_html( $public_phone ); ?></a></div>
					</li>
					<li><span>📍</span>
						<div><strong>Địa chỉ</strong>
							<p><?php echo esc_html( $public_address ); ?></p>
						</div>
					</li>
					<li><span>💻</span>
						<div><strong>GitHub</strong><a href="<?php echo esc_url( $public_github ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( preg_replace( '#^https?://#', '', $public_github ) ); ?></a></div>
					</li>
					<li><span>📘</span>
						<div><strong>Facebook</strong><a href="<?php echo esc_url( $public_facebook ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( preg_replace( '#^https?://#', '', $public_facebook ) ); ?></a></div>
					</li>
				</ul>
				<div class="contact-mini-note">Thường phản hồi trong vòng 24 giờ.</div>
			</div>

			<div class="card contact-card contact-card--form">
				<?php if ('success' === $contact_status) : ?>
					<div class="alert alert-success">Gửi liên hệ thành công. Mình sẽ phản hồi sớm nhé!</div>
				<?php elseif ('required' === $contact_status) : ?>
					<div class="alert alert-error">Vui lòng nhập đầy đủ thông tin trước khi gửi.</div>
				<?php elseif ('invalid_email' === $contact_status) : ?>
					<div class="alert alert-error">Email chưa đúng định dạng. Bạn kiểm tra lại giúp mình.</div>
				<?php elseif ('failed' === $contact_status) : ?>
					<div class="alert alert-error">Gửi thất bại. Server mail chưa cấu hình SMTP (đặc biệt trên localhost/XAMPP). Cần cấu hình SMTP để gửi được.</div>
				<?php elseif ('invalid_nonce' === $contact_status) : ?>
					<div class="alert alert-error">Phiên gửi không hợp lệ. Bạn tải lại trang rồi thử lại nhé.</div>
				<?php endif; ?>

				<form action="<?php echo esc_url( $form_action ); ?>" method="post">
					<input type="hidden" name="action" value="portfolio_contact_send">
					<?php wp_nonce_field( 'portfolio_contact_send', 'portfolio_contact_nonce' ); ?>
					<div class="form-group">
						<label for="contact-name">Họ và tên</label>
						<input type="text" name="name" id="contact-name" required>
					</div>
					<div class="form-group">
						<label for="contact-email">Email</label>
						<input type="email" name="email" id="contact-email" required>
					</div>
					<div class="form-group">
						<label for="contact-subject">Tiêu đề</label>
						<input type="text" name="subject" id="contact-subject" required>
					</div>
					<div class="form-group">
						<label for="contact-message">Nội dung</label>
						<textarea name="message" id="contact-message" required></textarea>
					</div>
					<button type="submit" class="contact-submit">Gửi liên hệ</button>
				</form>
			</div>
		</div>

		<div class="card contact-map">
			<h3>Google Maps địa chỉ nhà</h3>
			<iframe
				src="<?php echo esc_url( $map_embed ); ?>"
				width="100%"
				height="450"
				style="border:0;"
				allowfullscreen=""
				loading="lazy"
				referrerpolicy="no-referrer-when-downgrade">
			</iframe>
		</div>
	</div>
</section>
<?php
get_footer();
