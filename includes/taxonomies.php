<?php

/**
 * Registers a custom category taxonomy for courses.
 *
 * This function is called in the course-management-tool.php file.
 */

function cmt_register_course_taxonomy() {
    $customcategory = [
        'labels' => [
            'name' => __('Course Categories', 'course-management-tool'),
            'singular_name' => __('Course Category', 'course-management-tool'),
        ],
        'public' => true,
        'show_ui' => true,
        'hierarchical' => true, // we want it to behave like categories, not like tags
        'show_in_rest' => true,
    ];
    register_taxonomy('course_category', 'course', $customcategory);
}
add_action('init', 'cmt_register_course_taxonomy');

?>