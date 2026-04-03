<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="page-section resume-page">
	<div class="container">
		<div class="resume-hero card">
			<p class="resume-eyebrow">Resume</p>
			<h2>Kỹ năng &amp; Học vấn</h2>
			<p class="meta">
				Sinh viên ngành Công nghệ Thông tin tại <strong>Trường Đại học Tây Nguyên</strong>, định hướng
				trở thành Web/Backend Developer.
			</p>
		</div>

		<div class="grid-2">
			<div class="card resume-card">
				<h3>Học vấn (Timeline)</h3>
				<ul class="timeline resume-timeline">
					<li>
						<span class="timeline-year">2023 - Nay</span>
						<h4>Sinh viên CNTT - Trường Đại học Tây Nguyên</h4>
						<p>Tập trung học nền tảng lập trình, cấu trúc dữ liệu, cơ sở dữ liệu và phát triển ứng dụng web.</p>
					</li>
					<li>
						<span class="timeline-year">2024</span>
						<h4>Hoàn thành các học phần cốt lõi</h4>
						<p>Cấu trúc dữ liệu &amp; Giải thuật, Cơ sở dữ liệu, Lập trình Web.</p>
					</li>
					<li>
						<span class="timeline-year">2025</span>
						<h4>Phát triển dự án thực tế</h4>
						<p>Thực hiện đồ án nhóm và dự án cá nhân: website quản lý, portfolio và ứng dụng học tập.</p>
					</li>
					<li>
						<span class="timeline-year">2026 (Mục tiêu)</span>
						<h4>Nâng cao năng lực nghề nghiệp</h4>
						<p>Hoàn thiện kỹ năng backend, làm việc theo quy trình Git và tham gia thực tập Web Developer.</p>
					</li>
				</ul>
			</div>

			<div class="card resume-card">
				<h3>Kỹ năng</h3>

				<div class="skill-group">
					<p class="skill-title">Ngôn ngữ lập trình</p>
					<div class="skill-tags">
						<span class="skill-tag">C++</span>
						<span class="skill-tag">Python</span>
						<span class="skill-tag">PHP</span>
						<span class="skill-tag">JavaScript</span>
					</div>
				</div>

				<div class="skill-group">
					<p class="skill-title">Công cụ</p>
					<div class="skill-tags">
						<span class="skill-tag">Git</span>
						<span class="skill-tag">Linux</span>
						<span class="skill-tag">VSCode</span>
						<span class="skill-tag">XAMPP</span>
						<span class="skill-tag">MySQL</span>
					</div>
				</div>

				<div class="skill-group">
					<p class="skill-title">Mức độ thành thạo</p>
					<div class="skill-meter-wrap">
						<p>Backend cơ bản (PHP/MySQL)</p>
						<div class="skill-meter"><span style="width: 80%"></span></div>
					</div>
					<div class="skill-meter-wrap">
						<p>Python/C++</p>
						<div class="skill-meter"><span style="width: 75%"></span></div>
					</div>
					<div class="skill-meter-wrap">
						<p>Git &amp; Workflow</p>
						<div class="skill-meter"><span style="width: 72%"></span></div>
					</div>
				</div>

				<div class="skill-note">
					Kỹ năng mềm: làm việc nhóm, giao tiếp, quản lý thời gian, chủ động tự học.
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
