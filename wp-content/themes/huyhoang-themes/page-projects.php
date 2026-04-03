<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$project_query = new WP_Query(
	array(
		'post_type'      => 'portfolio_project',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => array(
					'menu_order' => 'ASC',
					'DATE'       => 'ASC',
				),
			)
		);

		get_header();
		?>
		<section class="page-section projects-v2">
			<div class="container">
				<div class="projects-v2-head card">
					<h2>Dự án / Portfolio</h2>
					<p class="meta">Một số dự án tiêu biểu mình đã thực hiện trong quá trình học tập.</p>
				</div>
				<div class="projects-list">
					<?php if ( $project_query->have_posts() ) : ?>
						<?php $project_index = 0; ?>
						<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
							<?php
							$project_id = get_the_ID();
							$github     = get_post_meta( $project_id, '_huyhoang_project_github', true );
							$media      = array();

							for ( $i = 1; $i <= 3; $i++ ) {
								$type = get_post_meta( $project_id, "_huyhoang_media_{$i}_type", true );
								$src  = get_post_meta( $project_id, "_huyhoang_media_{$i}_src", true );
								$alt  = get_post_meta( $project_id, "_huyhoang_media_{$i}_alt", true );

								if ( ! empty( $src ) ) {
									$media[] = array(
										'type' => $type ? $type : 'image',
										'src'  => $src,
										'alt'  => $alt ? $alt : get_the_title(),
									);
								}
							}

							$main_media      = isset( $media[0] ) ? $media[0] : null;
							$secondary_media = array_slice( $media, 1, 2 );
							$card_class      = ( $project_index % 2 === 1 ) ? ' project-card--reverse' : '';
							$project_index++;
							?>
							<article class="card project-card<?php echo esc_attr( $card_class ); ?>">
								<div class="project-media-layout">
									<div class="project-media-main">
										<?php if ( $main_media ) : ?>
											<?php if ( 'video' === $main_media['type'] ) : ?>
												<iframe class="project-media-frame" title="<?php echo esc_attr( $main_media['alt'] ); ?>" loading="lazy" src="<?php echo esc_url( $main_media['src'] ); ?>" allowfullscreen></iframe>
											<?php else : ?>
												<a class="project-media-link" href="<?php echo esc_url( $main_media['src'] ); ?>" data-lightbox="project" aria-label="Mở ảnh lớn: <?php echo esc_attr( $main_media['alt'] ); ?>">
													<img class="project-thumb" src="<?php echo esc_url( $main_media['src'] ); ?>" alt="<?php echo esc_attr( $main_media['alt'] ); ?>">
												</a>
											<?php endif; ?>
										<?php endif; ?>
									</div>

									<div class="project-media-side">
										<?php foreach ( $secondary_media as $item ) : ?>
											<div class="project-media-sub">
												<?php if ( 'video' === $item['type'] ) : ?>
													<iframe class="project-media-frame" title="<?php echo esc_attr( $item['alt'] ); ?>" loading="lazy" src="<?php echo esc_url( $item['src'] ); ?>" allowfullscreen></iframe>
												<?php else : ?>
													<a class="project-media-link" href="<?php echo esc_url( $item['src'] ); ?>" data-lightbox="project" aria-label="Mở ảnh lớn: <?php echo esc_attr( $item['alt'] ); ?>">
														<img class="project-thumb" src="<?php echo esc_url( $item['src'] ); ?>" alt="<?php echo esc_attr( $item['alt'] ); ?>">
													</a>
												<?php endif; ?>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<h3><?php the_title(); ?></h3>
								<p class="meta"><?php echo esc_html( wp_strip_all_tags( get_the_excerpt() ? get_the_excerpt() : get_the_content() ) ); ?></p>
								<p><a class="btn" href="<?php echo esc_url( $github ); ?>" target="_blank" rel="noopener noreferrer">Xem GitHub</a></p>
							</article>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<div class="card project-card">
							<h3>Chưa có dữ liệu dự án</h3>
							<p class="meta">Vui lòng thêm bài viết thuộc loại nội dung <strong>portfolio_project</strong> trong trang quản trị.</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<div class="project-lightbox" id="project-lightbox" aria-hidden="true">
			<button class="project-lightbox-close" type="button" id="project-lightbox-close" aria-label="Đóng">&times;</button>
			<img id="project-lightbox-image" src="" alt="Ảnh dự án phóng to">
		</div>

		<script>
		document.addEventListener('DOMContentLoaded', function () {
			var lightbox = document.getElementById('project-lightbox');
			var lightboxImage = document.getElementById('project-lightbox-image');
			var closeBtn = document.getElementById('project-lightbox-close');
			var imageLinks = document.querySelectorAll('a[data-lightbox="project"]');

			if (!lightbox || !lightboxImage || !closeBtn || !imageLinks.length) {
				return;
			}

			var closeLightbox = function () {
				lightbox.classList.remove('is-open');
				lightbox.setAttribute('aria-hidden', 'true');
				lightboxImage.setAttribute('src', '');
			};

			imageLinks.forEach(function (link) {
				link.addEventListener('click', function (event) {
					event.preventDefault();
					lightboxImage.setAttribute('src', link.getAttribute('href'));
					lightbox.classList.add('is-open');
					lightbox.setAttribute('aria-hidden', 'false');
				});
			});

			closeBtn.addEventListener('click', closeLightbox);

			lightbox.addEventListener('click', function (event) {
				if (event.target === lightbox) {
					closeLightbox();
				}
			});

			document.addEventListener('keydown', function (event) {
				if ('Escape' === event.key && lightbox.classList.contains('is-open')) {
					closeLightbox();
				}
			});
		});
		</script>
		<?php
		get_footer();
