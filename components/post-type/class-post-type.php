<?php 
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }


class Custom_Post{

	public $posttype = 'books';

	public function __construct(){
    	add_action( 'init', [$this, 'books_post_type'], 0 );
    }

	public function books_post_type() {
	  $slug = 'books';
      $labels = array(
        'name'                  => _x( 'Books', 'Post Type General Name', 'books' ),
        'singular_name'         => _x( 'Books', 'Post type singular name', 'books' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'books' ),
        'name_admin_bar'        => _x( 'Books', 'Add New on Toolbar', 'books' ),
        'add_new'               => __( 'New Books', 'books' ),
        'add_new_item'          => __( 'Add New Books', 'books' ),
        'new_item'              => __( 'New Books', 'books' ),
        'edit_item'             => __( 'Edit Books', 'books' ),
        'view_item'             => __( 'View Books', 'books' ),
        'view_items'            => __( 'View Books', 'books' ),
        'all_items'             => __( 'Book Lists', 'books' ),
        'search_items'          => __( 'Search Books', 'books' ),
        'parent_item_colon'     => __( 'Parent Books:', 'books' ),
        'not_found'             => __( 'Not Books found', 'books' ),
        'not_found_in_trash'    => __( 'Not Books found in Trash', 'books' ),
        'featured_image'        => _x( 'Featured Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'books' ),
        'set_featured_image'    => _x( 'Set featured image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'books' ),
        'remove_featured_image' => _x( 'Remove featured image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'books' ),
        'use_featured_image'    => _x( 'Use as featured image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'books' ),
        'archives'              => _x( 'Books', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'books' ),
        'insert_into_item'      => _x( 'Insert into Books', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'books' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Books', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'books' ),
        'filter_items_list'     => _x( 'Filter Books', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'books' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'books' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'books' ),
        'attributes'            => __( 'Books', 'books' ),
        'update_item'           => __( 'Update Item', 'books' ),
      );
      $args = array(
        'label'                 => __( 'Books', 'books' ),
        'description'           => __( 'Books Description', 'books' ),
        'labels'                => $labels,
        'supports'              =>  ['title' ],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 59,
        'menu_icon'             => 'dashicons-book-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'rewrite' 	=> array(
			'slug' => $slug
		),
        'show_in_rest' => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
      );
      
      flush_rewrite_rules();
      register_post_type( $this->posttype, $args );

    }
}