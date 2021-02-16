<?php
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

Final class Plugin {

    const __BOOKS_PHP__ = '5.6';
    const __MINIMUM_EL_VERSION__ = '2.0.0';
    const __RECOMMENDATION_EL_VERSION__ = '2.0.0';
    
    public static $instance = null;
    private static $classes_map;
    
    public static function instance(){
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
            do_action( 'custom_books/loaded' );
        }
        return self::$instance;
    }
    
    private function books_notice() {
        require_once BOOKS_PATH . 'classes/class-notice.php';
        return new Notice();
    }
    public function books_thanks_message(){
         return $this->books_notice()->thanks_message_notice(); 
    }
    public function ajax_books_set_thanks_message(){
         return $this->books_notice()->ajax_books_set_thanks_message(); 
    }

    public function books_load_check(){
       $this->register_autoloader();
    }
    public function api_post()
    {
        $response = wp_remote_get( 'https://openlibrary.org/books/OL7353617M.json', [
            'timeout' => 25,
        ] );
        $data = json_decode( wp_remote_retrieve_body( $response ), true );
        $args = array(
          'post_title' => $data['title'],
          'post_content' => $data['first_sentence']['value'],
          'post_excerpt' => $data['first_sentence']['value'],
          'post_status' => 'publish',
          'post_type' => 'books',
          'meta_input' => array(
            '_isbn_author' => $data['contributions'][0],
            '_isbn_publisher' => $data['publishers'][0],
            '_isbn_number' => $data['isbn_10'][0],
            '_isbn_pages' => $data['number_of_pages'],
            '_isbn_pub_date' => $data['publish_date'],
          ),
        );
        $postID = wp_insert_post($args);
    }
    public function books_activation(){
        require_once BOOKS_PATH . 'classes/class-activator.php';
        Books_Activator::books_activate();
    }
    
    public function books_deactivation(){
        require_once BOOKS_PATH . 'classes/class-deactivator.php';
        Books_Deactivator::books_deactivate();
        Books_Deactivator::books_user_meta_delete();     
    }

    public function books_installed_time() {
        $installed_time = get_option( 'books_installed_time' );

        if ( ! $installed_time ) {
            $installed_time = time();

            update_option( 'books_installed_time', $installed_time );
        }

        return $installed_time;
    }
    
    private function books_loaded(){
        add_action('plugins_loaded', [$this, 'books_load_check']);
    }

    private function books_hooks(){
        add_action( 'admin_notices', [$this, 'books_thanks_message'] );
        add_action( 'wp_ajax_books_set_thanks_message', [$this, 'ajax_books_set_thanks_message'] );
        register_activation_hook(BOOKS_FILE, [$this, 'books_activation']);
        register_activation_hook(BOOKS_FILE, [$this, 'api_post']);
        register_activation_hook(BOOKS_FILE, [$this, 'books_installed_time']);
        register_deactivation_hook(BOOKS_FILE, [$this, 'books_deactivation']);
        $this->books_loaded();
    }
    private function __construct(){
       $this->books_hooks();
    }
    private function register_autoloader() {
        require BOOKS_PATH . '/classes/autoloader.php';
        \Books\Autoloader::run();
        \Books\Autoloader::books_components();
    }
}

if (defined("BOOKS_PLUGIN_NAME")) {
    Plugin::instance();
}