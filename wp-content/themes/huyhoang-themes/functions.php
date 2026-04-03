<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function huyhoang_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'huyhoang_theme_setup' );

function huyhoang_enqueue_assets() {
	$style_path = get_stylesheet_directory() . '/style.css';
	$version    = file_exists( $style_path ) ? (string) filemtime( $style_path ) : '1.0.0';

	wp_enqueue_style( 'huyhoang-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'huyhoang_enqueue_assets' );

function huyhoang_nav_items() {
	return array(
		home_url( '/' )            => 'Trang chủ',
		home_url( '/resume/' )     => 'Kỹ năng & Học vấn',
		home_url( '/projects/' )   => 'Dự án',
		home_url( '/contact/' )    => 'Liên hệ',
	);
}

function huyhoang_portfolio_seed_projects() {
	return array(
		array(
			'title'       => 'Quản Lý Chi Tiêu',
			'description' => 'Ứng dụng hỗ trợ quản lý chi tiêu cá nhân, theo dõi thu/chi và thống kê tài chính.',
			'github'      => 'https://github.com/HuyHoangI4t/Quan_Ly_Chi_Tieu',
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
			'github'      => 'https://github.com/HuyHoangI4t/Bomber-man',
			'media'       => array(
				array(
					'type' => 'video',
					'src'  => 'https://www.youtube.com/embed/Vy-BTeYhVAY',
					'alt'  => 'Bomber-man - video demo',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/db1.png',
					'alt'  => 'Bomber-man - hình 1',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/db2.png',
					'alt'  => 'Bomber-man - hình 2',
				),
			),
		),
		array(
			'title'       => 'WEB-CB',
			'description' => 'Dự án web cơ bản tập trung vào giao diện, cấu trúc trang và các chức năng nền tảng.',
			'github'      => 'https://github.com/HuyHoangI4t/WEB-CB',
			'media'       => array(
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/wcb1.png',
					'alt'  => 'WEB-CB - hình 1',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/wcb2.png',
					'alt'  => 'WEB-CB - hình 2',
				),
				array(
					'type' => 'image',
					'src'  => get_template_directory_uri() . '/assets/images/wcb3.png',
					'alt'  => 'WEB-CB - hình 3',
				),
			),
		),
	);
}

function huyhoang_register_portfolio_project_cpt() {
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
add_action( 'init', 'huyhoang_register_portfolio_project_cpt' );

function huyhoang_render_portfolio_project_meta_box( $post ) {
	wp_nonce_field( 'huyhoang_portfolio_project_save', 'huyhoang_portfolio_project_nonce' );
	$github = get_post_meta( $post->ID, '_huyhoang_project_github', true );
	?>
	<p>
		<label for="huyhoang_project_github"><strong>Link GitHub</strong></label>
		<input type="url" id="huyhoang_project_github" name="huyhoang_project_github" value="<?php echo esc_attr( $github ); ?>" style="width:100%;">
	</p>
	<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
		<?php
		$type = get_post_meta( $post->ID, "_huyhoang_media_{$i}_type", true );
		$src  = get_post_meta( $post->ID, "_huyhoang_media_{$i}_src", true );
		$alt  = get_post_meta( $post->ID, "_huyhoang_media_{$i}_alt", true );
		?>
		<hr>
		<p><strong>Media <?php echo esc_html( $i ); ?></strong></p>
		<p>
			<label>Loại</label>
			<select name="huyhoang_media_<?php echo esc_attr( $i ); ?>_type" style="width:100%;">
				<option value="image" <?php selected( $type, 'image' ); ?>>Ảnh</option>
				<option value="video" <?php selected( $type, 'video' ); ?>>Video</option>
			</select>
		</p>
		<p>
			<label>Đường dẫn ảnh/video</label>
			<input type="text" name="huyhoang_media_<?php echo esc_attr( $i ); ?>_src" value="<?php echo esc_attr( $src ); ?>" style="width:100%;">
		</p>
		<p>
			<label>Mô tả alt</label>
			<input type="text" name="huyhoang_media_<?php echo esc_attr( $i ); ?>_alt" value="<?php echo esc_attr( $alt ); ?>" style="width:100%;">
		</p>
	<?php endfor; ?>
	<?php
}

function huyhoang_add_portfolio_project_meta_boxes() {
	add_meta_box(
		'huyhoang_portfolio_project_meta_box',
		'Thông tin dự án',
		'huyhoang_render_portfolio_project_meta_box',
		'portfolio_project',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'huyhoang_add_portfolio_project_meta_boxes' );

function huyhoang_save_portfolio_project_meta( $post_id ) {
	if ( ! isset( $_POST['huyhoang_portfolio_project_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['huyhoang_portfolio_project_nonce'] ) ), 'huyhoang_portfolio_project_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$github = isset( $_POST['huyhoang_project_github'] ) ? esc_url_raw( wp_unslash( $_POST['huyhoang_project_github'] ) ) : '';
	update_post_meta( $post_id, '_huyhoang_project_github', $github );

	for ( $i = 1; $i <= 3; $i++ ) {
		$type_key = "huyhoang_media_{$i}_type";
		$src_key  = "huyhoang_media_{$i}_src";
		$alt_key  = "huyhoang_media_{$i}_alt";

		$type = isset( $_POST[ $type_key ] ) && 'video' === wp_unslash( $_POST[ $type_key ] ) ? 'video' : 'image';
		$src  = isset( $_POST[ $src_key ] ) ? esc_url_raw( wp_unslash( $_POST[ $src_key ] ) ) : '';
		$alt  = isset( $_POST[ $alt_key ] ) ? sanitize_text_field( wp_unslash( $_POST[ $alt_key ] ) ) : '';

		update_post_meta( $post_id, "_huyhoang_media_{$i}_type", $type );
		update_post_meta( $post_id, "_huyhoang_media_{$i}_src", $src );
		update_post_meta( $post_id, "_huyhoang_media_{$i}_alt", $alt );
	}
}
add_action( 'save_post_portfolio_project', 'huyhoang_save_portfolio_project_meta' );

function huyhoang_seed_portfolio_projects_to_db() {
	if ( get_option( 'huyhoang_portfolio_projects_seeded' ) ) {
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
		update_option( 'huyhoang_portfolio_projects_seeded', 1 );
		return;
	}

	foreach ( huyhoang_portfolio_seed_projects() as $index => $project ) {
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

		update_post_meta( $post_id, '_huyhoang_project_github', $project['github'] );

		foreach ( $project['media'] as $media_index => $media ) {
			$slot = $media_index + 1;
			update_post_meta( $post_id, "_huyhoang_media_{$slot}_type", $media['type'] );
			update_post_meta( $post_id, "_huyhoang_media_{$slot}_src", $media['src'] );
			update_post_meta( $post_id, "_huyhoang_media_{$slot}_alt", $media['alt'] );
		}
	}

	update_option( 'huyhoang_portfolio_projects_seeded', 1 );
}
add_action( 'init', 'huyhoang_seed_portfolio_projects_to_db', 20 );

function huyhoang_get_or_create_page( $title, $slug ) {
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

function huyhoang_ensure_required_pages() {
	$home_id     = huyhoang_get_or_create_page( 'Home', 'home' );
	$resume_id   = huyhoang_get_or_create_page( 'Resume', 'resume' );
	$projects_id = huyhoang_get_or_create_page( 'Projects', 'projects' );
	$contact_id  = huyhoang_get_or_create_page( 'Contact', 'contact' );

	if ( $home_id ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home_id );
	}

	if ( $home_id && $resume_id && $projects_id && $contact_id ) {
		update_option( 'huyhoang_required_pages_created', 1 );
	}
}
add_action( 'init', 'huyhoang_ensure_required_pages' );
