<?php
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

class Books_Deactivator{
    
    public static function books_deactivate() {
        flush_rewrite_rules();
	}
    public static function books_user_meta_delete() {
        return delete_user_meta(get_current_user_id(), '_books_thanks_notice');
	}
}