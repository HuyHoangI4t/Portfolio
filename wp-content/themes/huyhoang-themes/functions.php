<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function portfolio_get_config_value( $key, $default = '' ) {
	if ( defined( $key ) ) {
		$value = constant( $key );
		if ( '' !== (string) $value ) {
			return (string) $value;
		}
	}

	$env = getenv( $key );

	if ( false !== $env && '' !== (string) $env ) {
		return (string) $env;
	}

	return (string) $default;
}

// Optional SMTP fallback (recommended: use WP Mail SMTP plugin).
function portfolio_configure_optional_smtp( $phpmailer ) {
	$smtp_user = portfolio_get_config_value( 'PORTFOLIO_SMTP_USER' );
	$smtp_pass = portfolio_get_config_value( 'PORTFOLIO_SMTP_PASS' );

	if ( '' === $smtp_user || '' === $smtp_pass ) {
		return;
	}

	$smtp_host   = portfolio_get_config_value( 'PORTFOLIO_SMTP_HOST', 'smtp.gmail.com' );
	$smtp_port   = (int) portfolio_get_config_value( 'PORTFOLIO_SMTP_PORT', '587' );
	$smtp_secure = portfolio_get_config_value( 'PORTFOLIO_SMTP_SECURE', 'tls' );
	$smtp_from   = portfolio_get_config_value( 'PORTFOLIO_SMTP_FROM', $smtp_user );
	$smtp_name   = portfolio_get_config_value( 'PORTFOLIO_SMTP_FROM_NAME', 'Portfolio' );

	$phpmailer->isSMTP();
	$phpmailer->Host       = $smtp_host;
	$phpmailer->SMTPAuth   = true;
	$phpmailer->Port       = $smtp_port > 0 ? $smtp_port : 587;
	$phpmailer->SMTPSecure = $smtp_secure;
	$phpmailer->Username   = $smtp_user;
	$phpmailer->Password   = $smtp_pass;
	$phpmailer->From       = $smtp_from;
	$phpmailer->FromName   = $smtp_name;
}
add_action( 'phpmailer_init', 'portfolio_configure_optional_smtp' );

function portfolio_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'portfolio_theme_setup' );

function portfolio_enqueue_assets() {
	$style_path = get_stylesheet_directory() . '/style.css';
	$version    = file_exists( $style_path ) ? (string) filemtime( $style_path ) : '1.0.0';

	wp_enqueue_style(
		'portfolio-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
		array(),
		'6.0.0'
	);

	wp_enqueue_style( 'portfolio-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'portfolio_enqueue_assets' );

function portfolio_get_contact_page_url() {
	$contact_page = get_page_by_path( 'contact' );

	if ( $contact_page instanceof WP_Post ) {
		return get_permalink( $contact_page );
	}

	return home_url( '/contact/' );
}

function portfolio_handle_contact_form() {
	if ( ! isset( $_POST['portfolio_contact_nonce'] ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'invalid_nonce', portfolio_get_contact_page_url() ) );
		exit;
	}

	$nonce = sanitize_text_field( wp_unslash( $_POST['portfolio_contact_nonce'] ) );

	if ( ! wp_verify_nonce( $nonce, 'portfolio_contact_send' ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'invalid_nonce', portfolio_get_contact_page_url() ) );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$subject  = isset( $_POST['subject'] ) ? sanitize_text_field( wp_unslash( $_POST['subject'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( '' === $name || '' === $email || '' === $subject || '' === $message ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'required', portfolio_get_contact_page_url() ) );
		exit;
	}

	if ( ! is_email( $email ) ) {
		wp_safe_redirect( add_query_arg( 'contact_status', 'invalid_email', portfolio_get_contact_page_url() ) );
		exit;
	}

	$to      = portfolio_get_config_value( 'PORTFOLIO_CONTACT_TO', get_option( 'admin_email' ) );
	$subject = '[Portfolio Contact] ' . $subject;
	$body    = "Họ tên: {$name}\n";
	$body   .= "Email: {$email}\n\n";
	$body   .= "Nội dung:\n{$message}\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $email,
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	$status = $sent ? 'success' : 'failed';

	wp_safe_redirect( add_query_arg( 'contact_status', $status, portfolio_get_contact_page_url() ) );
	exit;
}
add_action( 'admin_post_nopriv_portfolio_contact_send', 'portfolio_handle_contact_form' );
add_action( 'admin_post_portfolio_contact_send', 'portfolio_handle_contact_form' );

function portfolio_nav_items() {
	$home_url = home_url( '/' );

	$resume_page   = get_page_by_path( 'resume' );
	$projects_page = get_page_by_path( 'projects' );
	$contact_page  = get_page_by_path( 'contact' );

	$resume_url = $resume_page instanceof WP_Post ? get_permalink( $resume_page ) : home_url( '/resume/' );
	$projects_url = $projects_page instanceof WP_Post ? get_permalink( $projects_page ) : home_url( '/projects/' );
	$contact_url = $contact_page instanceof WP_Post ? get_permalink( $contact_page ) : home_url( '/contact/' );

	return array(
		$home_url     => 'Trang chủ',
		$resume_url   => 'Kỹ năng & Học vấn',
		$projects_url => 'Dự án',
		$contact_url  => 'Liên hệ',
	);
}

function portfolio_seed_projects() {
	return array(
		array(
			'title'       => 'SmartSpending',
			'description' => 'Ứng dụng quản lý chi tiêu cá nhân giúp theo dõi thu/chi, lập ngân sách và xem thống kê tài chính rõ ràng.',
			'github'      => 'https://github.com/your-username/smartspending',
			'media'       => array(
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/qlct1.png',
					'alt'  => 'Quản lý chi tiêu - Dashboard',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/qlct2.png',
					'alt'  => 'Quản lý chi tiêu - Ngân sách',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/qlct3.png',
					'alt'  => 'Quản lý chi tiêu - Hồ sơ người dùng',
				),
			),
		),
		array(
			'title'       => 'Bomber-man',
			'description' => 'Dự án game Bomber-man với gameplay đặt bom, vượt chướng ngại vật và tính điểm.',
			'github'      => 'https://github.com/your-username/bomber-man',
			'media'       => array(
				array(
					'type' => 'video',
					'src'  => 'https://www.youtube.com/embed/Vy-BTeYhVAY',
					'alt'  => 'Bomber-man - video demo',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/Db1.png',
					'alt'  => 'Bomber-man - hình 1',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/Db2.png',
					'alt'  => 'Bomber-man - hình 2',
				),
			),
		),
		array(
			'title'       => 'Chatbot TNU Assistant',
			'description' => 'Chatbot hỗ trợ sinh viên với giao diện trò chuyện thân thiện, hỗ trợ trả lời nhanh các câu hỏi thường gặp.',
			'github'      => 'https://github.com/your-username/chatbot-web',
			'media'       => array(
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/wcb1.png',
					'alt'  => 'Chatbot TNU Assistant - hình 1',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/wcb2.png',
					'alt'  => 'Chatbot TNU Assistant - hình 2',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/wcb3.png',
					'alt'  => 'Chatbot TNU Assistant - hình 3',
				),
			),
		),
	);
}


function portfolio_sync_seeded_projects() {
	$projects = get_posts(
		array(
			'post_type'      => 'portfolio_project',
			'post_status'    => 'any',
			'numberposts'    => -1,
			'orderby'        => 'ID',
			'order'          => 'ASC',
		)
	);

	$seed_projects = portfolio_seed_projects();

	foreach ( $projects as $index => $project ) {
		if ( ! isset( $seed_projects[ $index ] ) ) {
			continue;
		}

		$target = $seed_projects[ $index ];
		$post_data = array(
			'ID'           => $project->ID,
			'post_title'   => $target['title'],
			'post_content' => $target['description'],
			'post_excerpt' => $target['description'],
			'post_name'    => sanitize_title( $target['title'] ),
		);

		wp_update_post(
			$post_data
		);

		if ( isset( $target['github'] ) ) {
			update_post_meta( $project->ID, '_portfolio_project_github', esc_url_raw( $target['github'] ) );
		}

		for ( $slot = 1; $slot <= 3; $slot++ ) {
			$media = isset( $target['media'][ $slot - 1 ] ) ? $target['media'][ $slot - 1 ] : array();
			$type  = ( isset( $media['type'] ) && 'video' === $media['type'] ) ? 'video' : 'image';
			$src   = isset( $media['src'] ) ? esc_url_raw( $media['src'] ) : '';
			$alt   = isset( $media['alt'] ) ? sanitize_text_field( $media['alt'] ) : '';

			update_post_meta( $project->ID, "_portfolio_media_{$slot}_type", $type );
			update_post_meta( $project->ID, "_portfolio_media_{$slot}_src", $src );
			update_post_meta( $project->ID, "_portfolio_media_{$slot}_alt", $alt );
		}
	}
}
add_action( 'init', 'portfolio_sync_seeded_projects', 25 );
function portfolio_register_project_cpt() {
	register_post_type(
		'portfolio_project',
		array(
			'labels'       => array(
				'name'          => 'Dự án',
				'singular_name' => 'Dự án',
				'add_new_item'   => 'Thêm dự án mới',
				'edit_item'      => 'Sửa dự án',
			),
			'public'       => true,
			'show_in_menu' => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'editor', 'excerpt', 'page-attributes' ),
			'has_archive'  => false,
			'rewrite'      => array( 'slug' => 'du-an' ),
		)
	);
}
add_action( 'init', 'portfolio_register_project_cpt' );

function portfolio_render_project_meta_box( $post ) {
	wp_nonce_field( 'portfolio_project_save', 'portfolio_project_nonce' );
	$github = get_post_meta( $post->ID, '_portfolio_project_github', true );
	?>
	<p>
		<label for="portfolio_project_github"><strong>Link GitHub</strong></label>
		<input type="url" id="portfolio_project_github" name="portfolio_project_github" value="<?php echo esc_attr( $github ); ?>" style="width:100%;">
	</p>
	<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
		<?php
		$type = get_post_meta( $post->ID, "_portfolio_media_{$i}_type", true );
		$src  = get_post_meta( $post->ID, "_portfolio_media_{$i}_src", true );
		$alt  = get_post_meta( $post->ID, "_portfolio_media_{$i}_alt", true );
		?>
		<hr>
		<p><strong>Media <?php echo esc_html( $i ); ?></strong></p>
		<p>
			<label>Loại</label>
			<select name="portfolio_media_<?php echo esc_attr( $i ); ?>_type" style="width:100%;">
				<option value="image" <?php selected( $type, 'image' ); ?>>Ảnh</option>
				<option value="video" <?php selected( $type, 'video' ); ?>>Video</option>
			</select>
		</p>
		<p>
			<label>Đường dẫn ảnh/video</label>
			<input type="text" name="portfolio_media_<?php echo esc_attr( $i ); ?>_src" value="<?php echo esc_attr( $src ); ?>" style="width:100%;">
		</p>
		<p>
			<label>Mô tả alt</label>
			<input type="text" name="portfolio_media_<?php echo esc_attr( $i ); ?>_alt" value="<?php echo esc_attr( $alt ); ?>" style="width:100%;">
		</p>
	<?php endfor; ?>
	<?php
}

function portfolio_add_project_meta_boxes() {
	add_meta_box(
		'portfolio_project_meta_box',
		'Thông tin dự án',
		'portfolio_render_project_meta_box',
		'portfolio_project',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'portfolio_add_project_meta_boxes' );

function portfolio_save_project_meta( $post_id ) {
	if ( ! isset( $_POST['portfolio_project_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['portfolio_project_nonce'] ) ), 'portfolio_project_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$github = isset( $_POST['portfolio_project_github'] ) ? esc_url_raw( wp_unslash( $_POST['portfolio_project_github'] ) ) : '';
	update_post_meta( $post_id, '_portfolio_project_github', $github );

	for ( $i = 1; $i <= 3; $i++ ) {
		$type_key = "portfolio_media_{$i}_type";
		$src_key  = "portfolio_media_{$i}_src";
		$alt_key  = "portfolio_media_{$i}_alt";

		$type = isset( $_POST[ $type_key ] ) && 'video' === wp_unslash( $_POST[ $type_key ] ) ? 'video' : 'image';
		$src  = isset( $_POST[ $src_key ] ) ? esc_url_raw( wp_unslash( $_POST[ $src_key ] ) ) : '';
		$alt  = isset( $_POST[ $alt_key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $alt_key ] ) ) : '';

		update_post_meta( $post_id, "_portfolio_media_{$i}_type", $type );
		update_post_meta( $post_id, "_portfolio_media_{$i}_src", $src );
		update_post_meta( $post_id, "_portfolio_media_{$i}_alt", $alt );
	}
}
add_action( 'save_post_portfolio_project', 'portfolio_save_project_meta' );

function portfolio_seed_projects_to_db() {
	if ( get_option( 'portfolio_projects_seeded' ) ) {
		return;
	}

	$existing = get_posts(
		array(
			'post_type'      => 'portfolio_project',
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
		)
	);

	if ( ! empty( $existing ) ) {
		update_option( 'portfolio_projects_seeded', 1 );
		return;
	}

	foreach ( portfolio_seed_projects() as $index => $project ) {
		$post_id = wp_insert_post(
			array(
				'post_type'    => 'portfolio_project',
				'post_status'  => 'publish',
				'post_title'   => $project['title'],
				'post_content' => $project['description'],
				'post_excerpt'  => $project['description'],
				'menu_order'    => $index * 10,
			),
			true
		);

		if ( is_wp_error( $post_id ) || ! $post_id ) {
			continue;
		}

		update_post_meta( $post_id, '_portfolio_project_github', $project['github'] );

		foreach ( $project['media'] as $media_index => $media ) {
			$slot = $media_index + 1;
			update_post_meta( $post_id, "_portfolio_media_{$slot}_type", $media['type'] );
			update_post_meta( $post_id, "_portfolio_media_{$slot}_src", $media['src'] );
			update_post_meta( $post_id, "_portfolio_media_{$slot}_alt", $media['alt'] );
		}
	}

	update_option( 'portfolio_projects_seeded', 1 );
}
add_action( 'init', 'portfolio_seed_projects_to_db', 20 );

function portfolio_get_or_create_page( $title, $slug ) {
	$page = get_page_by_path( $slug );

	if ( $page instanceof WP_Post ) {
		return (int) $page->ID;
	}

	$page_id = wp_insert_post(
		array(
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_content' => '',
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		return 0;
	}

	return (int) $page_id;
}

function portfolio_ensure_required_pages() {
	$home_id     = portfolio_get_or_create_page( 'Home', 'home' );
	$resume_id   = portfolio_get_or_create_page( 'Resume', 'resume' );
	$projects_id = portfolio_get_or_create_page( 'Projects', 'projects' );
	$contact_id  = portfolio_get_or_create_page( 'Contact', 'contact' );

	if ( $home_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	if ( $home_id && $resume_id && $projects_id && $contact_id ) {
		update_option( 'portfolio_required_pages_created', 1 );
	}
}
add_action( 'init', 'portfolio_ensure_required_pages' );
