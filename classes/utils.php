<?php
namespace Books;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

class Utils
{   
    static $plugin_path = null;
    static $plugin_url = null;
    protected $path;

    public function books_plugin_url($path = '')
    {
        $url = plugins_url($path, BOOKS_FILE);

        if (is_ssl()
            and 'http:' == substr($url, 0, 5)) {
            $url = 'https:' . substr($url, 5);
        }
        return $url;
    }

    public static function books_version() {
       return BOOKS_VERSION;
    }
}
