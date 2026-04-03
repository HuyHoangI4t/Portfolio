<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="page-section contact-page">
	<div class="container">
		<div class="contact-head card">
			<h2>Liên hệ</h2>
			<p class="meta">Bạn có thể gửi thông tin trực tiếp qua Gmail bằng biểu mẫu bên dưới.</p>
		</div>

		<div class="contact-layout">
			<div class="card contact-card contact-card--info">
				<h3>Thông tin liên hệ</h3>
				<img class="contact-profile-photo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/avt.png' ); ?>" alt="Ảnh cá nhân Nguyễn Huy Hoàng">
				<ul class="contact-items">
					<li><span>✉️</span><div><strong>Email</strong><a href="mailto:huyhoangpro187@gmail.com">huyhoangpro187@gmail.com</a></div></li>
					<li><span>📍</span><div><strong>Địa chỉ</strong><p>Ea Drông, Buôn Hồ, Đăk Lăk</p></div></li>
					<li><span>💻</span><div><strong>GitHub</strong><a href="https://github.com/HuyHoangI4t" target="_blank" rel="noopener noreferrer">github.com/HuyHoangI4t</a></div></li>
					<li><span>📘</span><div><strong>Facebook</strong><a href="https://www.facebook.com/hamm67" target="_blank" rel="noopener noreferrer">facebook.com/hamm67</a></div></li>
				</ul>
				<div class="contact-mini-note">Thường phản hồi trong vòng 24 giờ.</div>
			</div>

			<div class="card contact-card contact-card--form">
				<h3>Contact Form</h3>
				<form id="gmail-contact-form" action="" method="post">
					<div class="form-group">
						<label for="gmail-name">Họ và tên</label>
						<input type="text" name="name" id="gmail-name" required>
					</div>
					<div class="form-group">
						<label for="gmail-email">Email</label>
						<input type="email" name="email" id="gmail-email" required>
					</div>
					<div class="form-group">
						<label for="gmail-subject">Tiêu đề</label>
						<input type="text" name="subject" id="gmail-subject" required>
					</div>
					<div class="form-group">
						<label for="gmail-message">Nội dung</label>
						<textarea name="message" id="gmail-message" required></textarea>
					</div>
					<button type="submit" class="contact-submit">Gửi qua Gmail</button>
				</form>
				<p class="meta contact-submit-note">Bấm nút sẽ mở Gmail để gửi trực tiếp.</p>
			</div>
		</div>

		<div class="card contact-map">
			<h3>Google Maps địa chỉ nhà</h3>
			<iframe title="Google Maps" loading="lazy" allowfullscreen src="https://www.google.com/maps?q=R9V6%2BH28%2C+Ea+Drong%2C+Buon+Ho&output=embed"></iframe>
		</div>
	</div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
	var form = document.getElementById('gmail-contact-form');
	if (!form) return;

	form.addEventListener('submit', function (event) {
		event.preventDefault();

		var name = (document.getElementById('gmail-name') || {}).value || '';
		var email = (document.getElementById('gmail-email') || {}).value || '';
		var subject = (document.getElementById('gmail-subject') || {}).value || '';
		var message = (document.getElementById('gmail-message') || {}).value || '';

		var to = 'huyhoangpro187@gmail.com';
		var fullSubject = '[Portfolio Contact] ' + subject;
		var body = 'Họ tên: ' + name + '\n'
			+ 'Email: ' + email + '\n\n'
			+ 'Nội dung:\n' + message;

		var gmailUrl = 'https://mail.google.com/mail/?view=cm&fs=1&to=' + encodeURIComponent(to)
			+ '&su=' + encodeURIComponent(fullSubject)
			+ '&body=' + encodeURIComponent(body);

		window.open(gmailUrl, '_blank', 'noopener');
	});
});
</script>
<?php
get_footer();
