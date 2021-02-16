<?php 
namespace Books;
use \Books\Utils;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }


class Custom_Field{

	public $prefix = '_isbn_';
	public $posts_metabox;
	public $custom_metabox;
	public function __construct() {
		
		$this->posts_metabox = array(
		'metabox'	=> array( 
			'id'         => 'books',
			'title'      => __( 'Books Data', 'books' ),
			'post_type'  => 'books',
			'context'    => 'normal',
			'priority'   => 'low',
			'tabs' 		 => true,
		),
		'fields'     => array(

			array(
				'title' => esc_html__('General', 'books'),
				'icon'  => 'icon-name',
				'type'  => 'heading'
			),

			array(
				'id' => $this->prefix . 'number',
				'title' => esc_html__('Number', 'books'),
				'description' => esc_html__('Type the isbn number', 'books'),
				'placeholder' => 'Isbn Number',
				'class' => '',
				'type' => 'number',
			),
			array(
				'id' => $this->prefix . 'pages',
				'title' => esc_html__('Page Number', 'books'),
				'description' => esc_html__('Type the isbn page number', 'books'),
				'placeholder' => 'Pages Number',
				'class' => '',
				'type' => 'number',
			),
			array(
				'id' => $this->prefix . 'author',
				'title' => esc_html__('Author Name', 'books'),
				'description' => esc_html__('Enter the Author Name ', 'books'),
				'placeholder' => 'Author Name',
				'class' => '',
				'type' => 'text',
			),
			array(
				'id' => $this->prefix . 'publisher',
				'title' => esc_html__('Publisher', 'books'),
				'description' => esc_html__('Enter the Publisher Name ', 'books'),
				'placeholder' => 'Publisher',
				'class' => '',
				'type' => 'text',
			),
			array(
				'id' => $this->prefix . 'pub_date',
				'title' => esc_html__('Publish Date', 'books'),
				'description' => esc_html__('Enter the Publish Date', 'books'),
				'placeholder' => 'Publish Date',
				'class' => '',
				'type' => 'text',
			),
			
		)
	);
        $this->custom_metabox = new Components\Metabox\Metabox($this->posts_metabox);
    }
}