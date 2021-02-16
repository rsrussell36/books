<?php
namespace Books;

use \Books\Utils;

if(!defined('ABSPATH') || !defined('WPINC')) { exit; }

class Enqueue{

	public $utils;

    public function __construct(){
        $this->init_hooks();
    }

    public function init_hooks(){
    	
    }
}