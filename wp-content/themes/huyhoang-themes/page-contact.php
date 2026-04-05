<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$contact_status = isset( $_GET['contact_status'] ) ? sanitize_key( wp_unslash( $_GET['contact_status'] ) ) : '';
$form_action    = esc_url( admin_url( 'admin-post.php' ) );

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
						<div><strong>Email</strong><a href="mailto:huyhoangpro187@gmail.com">huyhoangpro187@gmail.com</a></div>
					</li>
					<li><span>📞</span>
						<div><strong>SĐT</strong><a href="tel:0329106783">0329106783</a></div>
					</li>
					<li><span>📍</span>
						<div><strong>Địa chỉ</strong>
							<p>Ea Drông, Buôn Hồ, Đăk Lăk</p>
						</div>
					</li>
					<li><span>💻</span>
						<div><strong>GitHub</strong><a href="https://github.com/HuyHoangI4t" target="_blank" rel="noopener noreferrer">github.com/HuyHoangI4t</a></div>
					</li>
					<li><span>📘</span>
						<div><strong>Facebook</strong><a href="https://www.facebook.com/hamm67" target="_blank" rel="noopener noreferrer">facebook.com/hamm67</a></div>
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
					<input type="hidden" name="action" value="huyhoang_contact_send">
					<?php wp_nonce_field( 'huyhoang_contact_send', 'huyhoang_contact_nonce' ); ?>
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
				src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3697.5167898903346!2d108.35750707483912!3d12.843904987459899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDUwJzM4LjEiTiAxMDjCsDIxJzM2LjMiRQ!5e1!3m2!1svi!2s!4v1775367785588!5m2!1svi!2s"
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
