<?php 
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }


class Locale{
	public function __construct(){
    	//die('ok');
    }
	public static function books_plugin_textdomain() {
		load_plugin_textdomain(
			'books-textdomain',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}
}