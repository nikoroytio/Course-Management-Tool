<?php

/**
 * Registers the custom post type for courses.
 *
 * This function is called in the course-management-tool.php file.
 * It registers the custom post type 'course' with the specified labels, settings, and supports.
 * The custom post type will be public, have an archive, and support title, editor, and thumbnail.
 * It also enables the Gutenberg editor by setting 'show_in_rest' to true.
 */

function cmt_register_course_post_type() {
    $customtype = [
        'labels' => [
            'name' => __('Courses', 'course-management-tool'),
            'singular_name' => __('Course', 'course-management-tool'),
            'add_new' => __('Add New Course', 'course-management-tool'), //for readying translation
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'), //remove unneccessary supports, if you decide to use only custom meta boxes
        'show_in_rest' => true, // To enable Gutenberg editor
    ];
    register_post_type('course', $customtype);
}
add_action('init', 'cmt_register_course_post_type');

?>