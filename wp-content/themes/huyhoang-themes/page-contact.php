<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_status = isset( $_GET['contact_status'] ) ? sanitize_key( wp_unslash( $_GET['contact_status'] ) ) : '';
$form_action    = esc_url( admin_url( 'admin-post.php' ) );

$public_email    = 'huyhoangpro187@gmail.com';
$public_phone    = '0329106783';
$public_address  = 'Ea Drông, Buôn Hồ, Đăk Lăk';
$public_github   = 'https://github.com/HuyHoangI4t';
$public_facebook = 'https://www.facebook.com/hamm67';
$map_embed       = 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3697.5167898903346!2d108.35750707483912!3d12.843904987459899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDUwJzM4LjEiTiAxMDjCsDIxJzM2LjMiRQ!5e1!3m2!1svi!2s!4v1775367785588!5m2!1svi!2s';

$public_phone_href = preg_replace( '/[^0-9+]/', '', $public_phone );
$has_valid_map_embed = false !== strpos( $map_embed, '/embed' );

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
			<?php if ( $has_valid_map_embed ) : ?>
				<iframe
					src="<?php echo esc_url( $map_embed ); ?>"
					width="100%"
					height="450"
					style="border:0;"
					allowfullscreen=""
					loading="lazy"
					referrerpolicy="no-referrer-when-downgrade">
				</iframe>
			<?php else : ?>
				<p class="meta">Chưa cấu hình link Google Maps embed hợp lệ. Hãy thêm URL dạng <strong>https://www.google.com/maps/embed?pb=...</strong> vào <code>PORTFOLIO_PUBLIC_MAP_EMBED</code> trong wp-config.php.</p>
				<p><a class="btn btn-soft" href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">Mở Google Maps</a></p>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
