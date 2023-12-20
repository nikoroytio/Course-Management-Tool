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

// Activation and deactivation hooks
//for naming we are using cm for course management
//we are also flushing, because these changes affects permalinks
function cm_activate() {
    cm_register_course_post_type();
    cm_register_course_taxonomy();
    flush_rewrite_rules();
}

//activation hook that the plugin functions are called when activated
register_activation_hook(__FILE__, 'cm_activate');

//deactivation hook that the plugin can be deactivated
function cm_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'cm_deactivate');


?>

