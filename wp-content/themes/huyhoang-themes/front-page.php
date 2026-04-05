<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$get_config = function_exists( 'portfolio_get_config_value' )
	? 'portfolio_get_config_value'
	: static function( $key, $default = '' ) {
		$env = getenv( $key );
		return false !== $env && '' !== (string) $env ? (string) $env : (string) $default;
	};

$owner_name = $get_config( 'PORTFOLIO_OWNER_NAME', 'Your Name' );
$profile_subtitle = $get_config( 'PORTFOLIO_PROFILE_SUBTITLE', 'Software Developer / IT Student' );
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="page-section home-v2">
	<div class="container">
		<div class="home-v2-hero card">
			<div>
				<p class="home-v2-kicker">Portfolio cá nhân</p>
				<h1>Xin chào, mình là <strong><?php echo esc_html( $owner_name ); ?></strong></h1>
				<p class="subtitle"><?php echo esc_html( $profile_subtitle ); ?></p>
				<p>Mục tiêu nghề nghiệp: trở thành <strong>Backend Developer</strong>, xây dựng hệ thống web ổn định, dễ mở rộng.</p>
				<div class="badge-row">
					<span class="badge"><i class="fa-solid fa-laptop-code"></i> CNTT</span>
					<span class="badge"><i class="fa-solid fa-server"></i> Backend</span>
					<span class="badge"><i class="fa-solid fa-code-branch"></i> Open Source</span>
				</div>
				<div class="home-cta-row">
					<a class="btn btn-primary" href="<?php echo esc_url( home_url( '/projects/' ) ); ?>"><i class="fa-solid fa-folder-open"></i> Xem dự án</a>
					<a class="btn btn-soft" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><i class="fa-solid fa-paper-plane"></i> Liên hệ</a>
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
				<div class="why-choose-card"><div class="why-icon"><i class="fa-solid fa-brain why-icon--logic"></i></div><h3>Tư duy Logic</h3><p>Giải quyết vấn đề theo hướng logic, ưu tiên hiệu năng và độ ổn định.</p></div>
				<div class="why-choose-card"><div class="why-icon"><i class="fa-solid fa-book-open why-icon--study"></i></div><h3>Tự học nhanh</h3><p>Chủ động học công nghệ mới và cập nhật kiến thức liên tục.</p></div>
				<div class="why-choose-card"><div class="why-icon"><i class="fa-solid fa-users why-icon--team"></i></div><h3>Làm việc nhóm</h3><p>Hợp tác tốt, tôn trọng quy trình và sẵn sàng hỗ trợ đồng đội.</p></div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();