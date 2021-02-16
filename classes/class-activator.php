<?php
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

class Books_Activator{
    public static function books_activate() {
		flush_rewrite_rules();
	}
}