<?php
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

	
class Autoloader {

	private static $classes_map;
	
	public static function run() {
		spl_autoload_register([__CLASS__, 'books_autoload']);
	}

	public static function get_classes_map() {
		if(!self::$classes_map) {
			self::initial_classes_map();
		}
		return self::$classes_map;
	}

	public static function initial_classes_map() {
		self::$classes_map = [
			'Custom_Post' => 'components/post-type/class-post-type.php',
			'Custom_Field' => 'components/metabox/class-field.php',
			//'Custom_Metabox' => 'components/metabox/class-metabox.php',
			'Notice' => 'classes/class-notice.php',
			'Locale' => 'admin/class-locale.php',
			'Enqueue' => 'classes/class-enqueue.php',
			'Utils' => 'classes/utils.php',
		];
	}
	public static function books_components(){
        new Custom_Post();
        new Custom_Field();
        //new Custom_Metabox();
        new Locale();
        new Enqueue();
    }
	
	private static function books_load_class($relative_class_name) {
		$classes_map = self::get_classes_map();

		if(isset($classes_map[$relative_class_name])) {
			$filename = BOOKS_PATH . $classes_map[$relative_class_name];
		} else {
			$filename = strtolower(preg_replace(['/([a-z])([A-Z])/', '/_/', '/\\\/'], ['$1-$2', '-', "/"], $relative_class_name));
			$filename = BOOKS_PATH.$filename.'.php';
		}

		if(is_readable($filename)) {
			require $filename;
		}
	}

	private static function books_autoload($class) {
		if(0 !== strpos($class, __NAMESPACE__.'\\')) {
			return;
		}

		$relative_class_name = preg_replace('/^'.__NAMESPACE__.'\\\/', '', $class);
		$final_class_name = __NAMESPACE__.'\\'.$relative_class_name;

		if(!class_exists($final_class_name)) {
			self::books_load_class($relative_class_name);
		}
	}

}