<?php
/*
Plugin Name: Course Management Tool
Description: management tool for adding courses
Text Domain: course-management-tool
Version: 1.0
Author: Niko Röytiö
Author URI: https://nikoroytio.com
*/

// Include other PHP files
include_once plugin_dir_path(__FILE__) . 'includes/custom-post-types.php';
include_once plugin_dir_path(__FILE__) . 'includes/taxonomies.php';
include_once plugin_dir_path(__FILE__) . 'includes/meta-boxes.php';
include_once plugin_dir_path(__FILE__) . 'includes/categories-shortcode.php';
/* 
include_once plugin_dir_path(__FILE__) . 'includes/fetch-json.php'; 
uncomment this, if you want to fetch courses from JSON file. Remember to change 
the URL in cmt_update_courses_from_json() function. Also remember to uncomment 
required attributes from meta-boxes.php and update shortcode function cmt_list_courses_by_category
in categories-shortcode.php to use custom metaboxes in said attributes
*/

// Activation and deactivation hooks
//for naming we are using cmt for course managementtool
//we are also flushing, because these changes affects permalinks
function cmt_activate() {
    cmt_register_course_taxonomy();
    cmt_register_course_post_type();
    flush_rewrite_rules();
}

//activation hook that the plugin functions are called when activated
register_activation_hook(__FILE__, 'cmt_activate');

//deactivation hook that the plugin can be deactivated
function cmt_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'cmt_deactivate');

// Enqueue styles and scripts
function cmt_enqueue_admin_styles() {
    wp_enqueue_style(
        'cmt-pluginstyles', // Handle for the stylesheet.
        plugin_dir_url(__FILE__) . 'css/pluginstyles.css', // Path to the CSS file.
        array(), // Dependencies.
        '1.0' // Version number.
    );
}
add_action('admin_enqueue_scripts', 'cmt_enqueue_admin_styles');

/* enable this, if you want to use javascript for image handler, which uses wordpress media library for 
custom post thumbnail image
function cmt_enqueue_admin_scripts() {
    // Enqueue the WordPress media scripts
    wp_enqueue_media();

    // we enqueue the scripts for the image handler
    wp_enqueue_script(
        'cmt-imageHandler', // Handle for the script.
        plugin_dir_url(__FILE__) . 'javascript/imageHandler.js', // Path to the script file.
        array('jquery'), // Dependencies, jQuery in this case.
        '1.0', // Script version number.
        true // Place in footer.
    );
}
add_action('admin_enqueue_scripts', 'cmt_enqueue_admin_scripts'); */
?>