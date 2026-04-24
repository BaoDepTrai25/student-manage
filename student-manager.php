<?php
/**
 * Plugin Name: Student Manager
 * Description: Plugin quản lý sinh viên với Custom Post Type, Meta Boxes và Shortcode.
 * Version: 1.0.0
 * Author: Nguyen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'SM_PATH', plugin_dir_path( __FILE__ ) );

require_once SM_PATH . 'includes/cpt.php';
require_once SM_PATH . 'includes/meta-box.php';
require_once SM_PATH . 'includes/shortcode.php';
