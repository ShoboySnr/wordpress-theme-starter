<?php
// Register custom post types here

add_action('init', 'techwithdee_register_project_post_type');

function techwithdee_register_project_post_type() {
    $labels = [
        'name'                  => __( 'Projects', 'techwithdee' ),
        'singular_name'         => __( 'Project', 'techwithdee' ),
        'menu_name'             => __( 'Projects', 'techwithdee' ),
        'name_admin_bar'        => __( 'Project', 'techwithdee' ),
        'add_new'               => __( 'Add New', 'techwithdee' ),
        'add_new_item'          => __( 'Add New recipe', 'techwithdee' ),
        'new_item'              => __( 'New recipe', 'techwithdee' ),
        'edit_item'             => __( 'Edit recipe', 'techwithdee' ),
        'view_item'             => __( 'View recipe', 'techwithdee' ),
        'all_items'             => __( 'All recipes', 'techwithdee' ),
        'search_items'          => __( 'Search recipes', 'techwithdee' ),
        'parent_item_colon'     => __( 'Parent recipes:', 'techwithdee' ),
        'not_found'             => __( 'No recipes found.', 'techwithdee' ),
        'not_found_in_trash'    => __( 'No recipes found in Trash.', 'techwithdee' ),
        'featured_image'        => __( 'Project Cover Image', 'techwithdee' ),
        'set_featured_image'    => __( 'Set cover image', 'techwithdee' ),
        'remove_featured_image' => __( 'Remove cover image', 'techwithdee' ),
        'use_featured_image'    => __( 'Use as cover image', 'techwithdee' ),
        'archives'              => __( 'Project archives', 'techwithdee' ),
        'insert_into_item'      => __( 'Insert into recipe', 'techwithdee' ),
        'uploaded_to_this_item' => __( 'Uploaded to this recipe', 'techwithdee' ),
        'filter_items_list'     => __( 'Filter recipes list', 'techwithdee' ),
        'items_list_navigation' => __( 'Projects list navigation', 'techwithdee' ),
        'items_list'            => __( 'Projects list', 'techwithdee' ),
    ];
    
    $args = [
        'labels'    => $labels
    ];
    
    register_post_type('projects', $args);
}

function wpdocs_codex_book_init() {
	$labels = array(
		'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
		'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
		'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
		'add_new'               => __( 'Add New', 'textdomain' ),
		'add_new_item'          => __( 'Add New Book', 'textdomain' ),
		'new_item'              => __( 'New Book', 'textdomain' ),
		'edit_item'             => __( 'Edit Book', 'textdomain' ),
		'view_item'             => __( 'View Book', 'textdomain' ),
		'all_items'             => __( 'All Books', 'textdomain' ),
		'search_items'          => __( 'Search Books', 'textdomain' ),
		'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
		'not_found'             => __( 'No books found.', 'textdomain' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
		'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
        'taxonomies'        => array('category'),
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'wpdocs_codex_book_init' );