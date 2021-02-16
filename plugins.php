<?php
/*
Plugin Name: Custom Books
Plugin URI: http://creativestheme.com/
Description: Custom Post Type Books. This is easy to use and you can customize different features as you like. Just plug and play.
Version: 1.0.0
Author: Abu Sayed Russell
Author URI: http://creativestheme.com/
License: GPLv3
Text Domain: custom-books
Domain Path: /languages
 */

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }


if (!defined("BOOKS_PLUGIN_NAME")) {
    define("BOOKS_PLUGIN_NAME", 'Custom Books');
}

if (!defined("BOOKS_VERSION")) {
    define("BOOKS_VERSION", '1.0.0');
}

if (!defined("BOOKS_WP_VERSION")) {
    define("BOOKS_WP_VERSION", '4.9');
}

if (!defined("BOOKS_PHP_VERSION")) {
    define("BOOKS_PHP_VERSION", '5.6');
}

if (!defined("BOOKS_FILE")) {
    define("BOOKS_FILE", __FILE__);
}

if (!defined("BOOKS_BASE")) {
    define("BOOKS_BASE", trailingslashit(plugin_basename(BOOKS_FILE)));
}

if (!defined("BOOKS_PATH")) {
    define("BOOKS_PATH", trailingslashit(plugin_dir_path(BOOKS_FILE)));
}

if (!defined("BOOKS_URL")) {
    define("BOOKS_URL", trailingslashit(plugin_dir_url(BOOKS_FILE)));
}
if (!defined("BOOKS_IMAGE")) {
    define("BOOKS_IMAGE", BOOKS_URL . 'assets/_images/');
}
require_once BOOKS_PATH . 'classes/core.php';