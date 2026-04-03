<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="page-section">
	<div class="container">
		<h2>Liên hệ</h2>
		<div class="grid-2">
			<div class="card">
				<h3>Thông tin liên hệ</h3>
				<ul class="contact-list">
					<li><strong>Email:</strong> huyhoangpro187@gmail.com</li>
					<li><strong>Địa chỉ:</strong> Ea Drông, Buôn Hồ, Đăk Lăk</li>
					<li><strong>GitHub:</strong> <a href="https://github.com/HuyHoangI4t" target="_blank" rel="noopener noreferrer">github.com/HuyHoangI4t</a></li>
					<li><strong>Gmail:</strong> <a href="mailto:huyhoangpro187@gmail.com">huyhoangpro187@gmail.com</a></li>
					<li><strong>Facebook:</strong> <a href="https://www.facebook.com/hamm67" target="_blank" rel="noopener noreferrer">facebook.com/hamm67</a></li>
				</ul>
			</div>
			<div class="card">
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
						<label for="gmail-message">Nội dung</label>
						<textarea name="message" id="gmail-message" required></textarea>
					</div>
					<button type="submit">Gửi qua Gmail</button>
				</form>
				<p class="meta" style="margin-top:8px;">Bấm nút sẽ mở Gmail để gửi trực tiếp.</p>
			</div>
		</div>
		<div class="card" style="margin-top: 18px;">
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
