<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="page-section hero-section">
	<div class="pattern-dots pattern-dots-1"></div>
	<div class="container hero">
		<div class="hero-card">
			<h1>Xin chào, mình là <strong>Nguyễn Huy Hoàng</strong></h1>
			<p class="subtitle">
				Sinh viên ngành Công nghệ Thông tin - Trường Đại học Tây Nguyên.
			</p>
			<p>
				Mục tiêu nghề nghiệp: trở thành <strong>Backend Developer</strong>, xây dựng các hệ thống web ổn định,
				dễ mở rộng và mang lại trải nghiệm tốt cho người dùng.
			</p>
			<div class="badge-row">
				<span class="badge"><i class="fa-solid fa-laptop-code"></i> Công nghệ thông tin</span>
				<span class="badge"><i class="fa-solid fa-server"></i> Định hướng Backend</span>
				<span class="badge"><i class="fa-solid fa-code-branch"></i> Yêu thích mã nguồn mở</span>
			</div>
			<div class="home-cta-row">
				<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>">
					<i class="fa-solid fa-folder-open"></i> Xem dự án
				</a>
				<a class="btn btn-soft" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<i class="fa-solid fa-paper-plane"></i> Liên hệ ngay
				</a>
			</div>
		</div>
		<div class="hero-image-wrap">
			<div class="profile-shape"></div>
			<img class="profile-photo" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/avt.png' ); ?>" alt="Ảnh cá nhân Nguyễn Huy Hoàng">
		</div>
	</div>
</section>

<section class="page-section tech-stack-section">
	<div class="container">
		<h2 class="home-section-title">🛠️ Tech Stack Của Mình</h2>
		<div class="tech-grid">
			<div class="tech-item">
				<div class="tech-icon">
					<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg" width="45" alt="C++">
				</div>
				<p>C++</p>
			</div>
			<div class="tech-item">
				<div class="tech-icon">
					<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" width="45" alt="Python">
				</div>
				<p>Python</p>
			</div>
			<div class="tech-item">
				<div class="tech-icon">
					<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" width="45" alt="Git">
				</div>
				<p>Git</p>
			</div>
			<div class="tech-item">
				<div class="tech-icon">
					<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg" width="45" alt="Linux">
				</div>
				<p>Linux</p>
			</div>
			<div class="tech-item">
				<div class="tech-icon">
					<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg" width="45" alt="MySQL">
				</div>
				<p>MySQL</p>
			</div>
			<div class="tech-item">
				<div class="tech-icon">
					<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vscode/vscode-original.svg" width="45" alt="VSCode">
				</div>
				<p>VSCode</p>
			</div>
		</div>
	</div>
</section>

<section class="page-section stats-section">
	<div class="pattern-dots pattern-dots-2"></div>
	<div class="container">
		<div class="stats-grid">
			<div class="stat-card">
				<div class="stat-number">3+</div>
				<div class="stat-label">Năm tại<br>Đại học</div>
			</div>
			<div class="stat-card">
				<div class="stat-number">3+</div>
				<div class="stat-label">Dự án<br>bài tập lớn</div>
			</div>
			<div class="stat-card">
				<div class="stat-number">90%</div>
				<div class="stat-label">Đam mê<br>Backend</div>
			</div>
		</div>
	</div>
</section>

<section class="page-section why-choose-section">
	<div class="container">
		<h2 class="home-section-title">🌟 Tại sao chọn mình?</h2>
		<div class="why-choose-grid">
			<div class="why-choose-card">
				<div class="why-icon"><i class="fa-solid fa-brain why-icon--logic"></i></div>
				<h3>Tư duy Logic</h3>
				<p>Giải quyết vấn đề phức tạp với cách tiếp cận logic và hiệu quả. Luôn tìm kiếm giải pháp tối ưu nhất.</p>
			</div>
			<div class="why-choose-card">
				<div class="why-icon"><i class="fa-solid fa-book-open why-icon--study"></i></div>
				<h3>Kỹ năng Tự học</h3>
				<p>Chủ động cập nhật công nghệ mới, tự học hỏi từ các nguồn tài liệu chất lượng và thực tiễn.</p>
			</div>
			<div class="why-choose-card">
				<div class="why-icon"><i class="fa-solid fa-users why-icon--team"></i></div>
				<h3>Làm việc Nhóm</h3>
				<p>Hợp tác tốt, lắng nghe ý kiến, và luôn sẵn sàng chia sẻ kiến thức để cùng nhau phát triển.</p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();