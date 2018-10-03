<?php
//Hide admin bar
show_admin_bar( false );

require_once( 'class-wp-bootstrap-navwalker.php' );

//Register menu
register_nav_menus( array(
	'main' => 'Main Menu',
) );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'menus' );
}
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' ) );
add_theme_support( 'post-thumbnails' );

//Load assets
function my_assets() {
	if ( ! is_page( 'contact' ) ) {
		wp_deregister_script( 'jquery' );
		wp_deregister_style( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );
	}

	wp_enqueue_script( 'vendors', get_template_directory_uri() . '/js/vendor.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'index', get_template_directory_uri() . '/js/index.min.js', array(), '1.0.0', true );

	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_enqueue_scripts', 'my_assets' );

//Portfolio CPT
add_action( 'init', 'add_portfolio_items' );
function add_portfolio_items() {
	register_post_type(
		'portfolio-item',
		array(
			'labels'            => array(
				'name'               => 'Cases',
				'singular_name'      => 'Case',
				'add_new'            => 'Add new item',
				'add_new_item'       => 'Add new item',
				'edit'               => 'Edit',
				'edit_item'          => 'Edit',
				'new_item'           => 'Add new item',
				'view'               => 'Edit item',
				'view_item'          => 'Edit item',
				'search_items'       => 'Search cases',
				'not_found'          => 'No items',
				'not_found_in_trash' => 'Trash is empty',
			),
			'public'            => true,
			'hierarchical'      => true,
			'has_archive'       => true,
			'menu_position'     => 7,
			'menu_icon'         => 'dashicons-format-gallery',
			'taxonomies'        => array( 'skills' ),
			'show_in_nav_menus' => true,
			'supports'          => array(
				'title',
				'editor',
				'thumbnail',
			),
			'can_export'        => true,
		)
	);
}

//Skills taxonomy
add_action( 'init', 'skills_cuctom_taxonomy', 0 );
function skills_cuctom_taxonomy() {
	$singular = 'Skill';
	$plural   = 'Skills';
	$labels   = array(
		'name'              => _x( $plural, 'taxonomy general name' ),
		'singular_name'     => _x( $singular, 'taxonomy singular name' ),
		'search_items'      => __( 'Search ' . $plural ),
		'all_items'         => __( 'All ' . $singular ),
		'parent_item'       => __( 'Parent ' . $singular ),
		'parent_item_colon' => __( 'Parent ' . $singular ),
		'edit_item'         => __( 'Edit ' . $singular ),
		'update_item'       => __( 'Update ' . $singular ),
		'add_new_item'      => __( 'Add New ' . $singular ),
		'new_item_name'     => __( 'New ' . $singular . ' name' ),
		'menu_name'         => __( $plural ),
	);
	register_taxonomy( 'skills', array( 'portfolio-item' ), array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'skills' ),
	) );
}

//Blog CPT
add_action( 'init', 'pf_register_blog_post_type' );
function pf_register_blog_post_type() {
	$singular = 'Blog Post';
	$plural   = 'Blog';
	$slug     = 'blog';
	$labels   = array(
		'name'               => $plural,
		'singular_name'      => $singular,
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New ' . $singular,
		'edit'               => 'Edit',
		'edit_item'          => 'Edit ' . $singular,
		'new_item'           => 'New ' . $singular,
		'view'               => 'View ' . $singular,
		'view_item'          => 'View ' . $singular,
		'search_term'        => 'Search ' . $plural,
		'parent'             => 'Parent ' . $singular,
		'not_found'          => 'No ' . $plural . ' found',
		'not_found_in_trash' => 'No ' . $plural . ' in Trash'
	);
	$args     = array(
		'labels'              => $labels,
		'taxonomies'          => array( 'post_tag' ),
		'public'              => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'show_in_nav_menus'   => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-welcome-write-blog',
		'can_export'          => true,
		'delete_with_user'    => false,
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'rewrite'             => array(
			'slug'       => $slug,
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		),
		'supports'            => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'comments',
			'revisions'
		)
	);
	register_post_type( $slug, $args );
}

//Add SVG media support
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

$acf_opt_args = array(
	'page_title' => 'Theme Settings',
	'menu_title' => 'Theme Settings',
	'icon_url'   => 'dashicons-hammer',
);
acf_add_options_page( $acf_opt_args );