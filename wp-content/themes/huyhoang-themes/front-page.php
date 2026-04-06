<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$owner_name = 'Nguyễn Huy Hoàng';
$profile_subtitle = 'Sinh viên ngành Công nghệ Thông tin - Trường Đại học Tây Nguyên.';
?>
<section class="page-section home-v2">
	<div class="container">
		<div class="home-v2-hero card">
			<div>
				<p class="home-v2-kicker">Portfolio cá nhân</p>
				<h1>Xin chào, mình là <strong><?php echo esc_html( $owner_name ); ?></strong></h1>
				<p class="subtitle"><?php echo esc_html( $profile_subtitle ); ?></p>
				<p>Mục tiêu nghề nghiệp: trở thành <strong>Backend Developer</strong>, xây dựng hệ thống web ổn định, dễ mở rộng.</p>
				<div class="badge-row">
					<span class="badge"><svg class="badge-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 5.5A1.5 1.5 0 0 1 5.5 4h13A1.5 1.5 0 0 1 20 5.5v9A1.5 1.5 0 0 1 18.5 16H14v2h2a1 1 0 1 1 0 2H8a1 1 0 1 1 0-2h2v-2H5.5A1.5 1.5 0 0 1 4 14.5zM6 6v8h12V6z"></path></svg> CNTT</span>
					<span class="badge"><svg class="badge-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 7h16v2H4zm2 4h12v2H6zm3 4h6v2H9zm-1 5h8a1 1 0 1 1 0 2H8a1 1 0 1 1 0-2z"></path></svg> Backend</span>
					<span class="badge"><svg class="badge-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 3c2.2 0 4 1.8 4 4 0 1.1-.4 2.1-1.1 2.8l4.6 4.6a1 1 0 0 1-1.4 1.4l-4.6-4.6c-.7.7-1.7 1.1-2.8 1.1-2.2 0-4-1.8-4-4s1.8-4 4-4zm-7 9a1 1 0 0 1 1 1c0 2.8 2.2 5 5 5h2a1 1 0 1 1 0 2h-2c-3.9 0-7-3.1-7-7a1 1 0 0 1 1-1z"></path></svg> Open Source</span>
				</div>
				<div class="home-cta-row">
					<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><svg class="btn-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M10 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-7l-2-2z"></path></svg> Xem dự án</a>
					<a class="btn btn-soft" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><svg class="btn-icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 5h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2zm0 3.2V17h16V8.2l-8 5.2-8-5.2zm1.3-1.2L12 12l6.7-4.4H5.3z"></path></svg> Liên hệ</a>
				</div>
			</div>
			<div class="home-v2-avatar-wrap">
				<div class="profile-shape"></div>
				<img class="profile-photo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/avt.png' ); ?>" alt="Ảnh cá nhân <?php echo esc_attr( $owner_name ); ?>">
			</div>
		</div>

		<div class="home-v2-stack card">
			<h2 class="home-section-title">🛠️ Tech Stack</h2>
			<div class="tech-grid">
				<div class="tech-item"><div class="tech-icon"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" width="45" alt="C++"></div><p>C++</p></div>
				<div class="tech-item"><div class="tech-icon"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" width="45" alt="Python"></div><p>Python</p></div>
				<div class="tech-item"><div class="tech-icon"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" width="45" alt="Git"></div><p>Git</p></div>
				<div class="tech-item"><div class="tech-icon"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg" width="45" alt="Linux"></div><p>Linux</p></div>
				<div class="tech-item"><div class="tech-icon"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" width="45" alt="MySQL"></div><p>MySQL</p></div>
				<div class="tech-item"><div class="tech-icon"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" width="45" alt="VSCode"></div><p>VSCode</p></div>
			</div>
		</div>

		<div class="home-v2-stats">
			<div class="stat-card"><div class="stat-number">3+</div><div class="stat-label">Năm tại<br>Đại học</div></div>
			<div class="stat-card"><div class="stat-number">3+</div><div class="stat-label">Dự án<br>bài tập lớn</div></div>
			<div class="stat-card"><div class="stat-number">90%</div><div class="stat-label">Đam mê<br>Backend</div></div>
		</div>

		<div class="home-v2-why">
			<h2 class="home-section-title">🌟 Tại sao chọn mình?</h2>
			<div class="why-choose-grid">
				<div class="why-choose-card"><div class="why-icon"><svg class="why-icon-code why-icon--logic" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2a7 7 0 0 0-4 12.8V17h8v-2.2A7 7 0 0 0 12 2zm-3 19a1 1 0 0 0 1 1h4a1 1 0 1 0 0-2h-4a1 1 0 0 0-1 1z"></path></svg></div><h3>Tư duy Logic</h3><p>Giải quyết vấn đề theo hướng logic, ưu tiên hiệu năng và độ ổn định.</p></div>
				<div class="why-choose-card"><div class="why-icon"><svg class="why-icon-code why-icon--study" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 5a2 2 0 0 1 2-2h12v16H6a2 2 0 0 0-2 2V5zm4 1h8v2H8V6zm0 4h8v2H8v-2zm0 4h5v2H8v-2z"></path></svg></div><h3>Tự học nhanh</h3><p>Chủ động học công nghệ mới và cập nhật kiến thức liên tục.</p></div>
				<div class="why-choose-card"><div class="why-icon"><svg class="why-icon-code why-icon--team" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 11a3 3 0 1 0-2.8-4H16a3 3 0 0 0 0 6h-1v2h1a5 5 0 0 1 0 10H8a5 5 0 0 1 0-10h1v-2H8a3 3 0 1 0 0-6h2.8A3 3 0 1 0 16 11z"></path></svg></div><h3>Làm việc nhóm</h3><p>Hợp tác tốt, tôn trọng quy trình và sẵn sàng hỗ trợ đồng đội.</p></div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();