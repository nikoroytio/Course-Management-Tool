<?php


/**
 * Register custom category meta box for courses.
 *
 * This function is called in the course-management-tool.php file to register
 * the 'Course Details' meta box for the 'course' post type.
 *
 */
function cm_add_course_meta_boxes() {
    add_meta_box(
        'course_details',
        __('Course Details', 'course-management-tool'),
        'cm_course_details_meta_box_callback',
        'course'
    );
}
add_action('add_meta_boxes', 'cm_add_course_meta_boxes');

/**
 * Callback function for the cm_course_details_meta_box.
 */
function cm_course_details_meta_box_callback($post) {
    // Use nonce for verification
    wp_nonce_field(plugin_basename(__FILE__), 'course_details_nonce');

    // Course Name field
    $course_name = get_post_meta($post->ID, 'course_name', true);
    echo '<label class="meta-box-label" for="course_name">' . __('Course Name', 'course-management-tool') . '</label> ';
    echo '<input class="meta-box-field" type="text" id="course_name" name="course_name" value="' . esc_attr($course_name) . '" />';
 
    // Short Description field
    $short_description = get_post_meta($post->ID, 'short_description', true);
    echo '<label class="meta-box-label" for="short_description">' . __('Short Description', 'course-management-tool') . '</label> ';
    echo '<textarea class="meta-box-field" id="short_description" name="short_description">' . esc_textarea($short_description) . '</textarea>';
    echo '</div>';

    // Course Description field
    $course_description = get_post_meta($post->ID, 'course_description', true);
    echo '<label class="meta-box-label" for="course_description">' . __('Course Description', 'course-management-tool') . '</label> ';
    echo '<textarea class="meta-box-field" id="course_description" name="course_description">' . esc_textarea($course_description) . '</textarea>';
    echo '</div>';

    // Course Image field
  /*   $course_image = get_post_meta($post->ID, 'course_image', true);
    echo '<button class="meta-box-button" id="upload_image_button">' . __('Select Image', 'course-management-tool') . '</button>';
    echo '<button class="meta-box-button" id="remove_image_button" style="display:none;">' . __('Remove Image', 'course-management-tool') . '</button>';
    echo '<input type="hidden" id="course_image" name="course_image" value="' . esc_attr($course_image) . '" />';
    echo '<div class="meta-box-img-preview" id="image_preview" style="margin-top:10px;">';
    if ($course_image) {
        echo '<img src="' . esc_url($course_image) . '" style="max-width:250px;"/>';
    }
    echo '</div>';
 */

  // Course Image (URL) field
    $course_image = get_post_meta($post->ID, 'course_image', true);
    echo '<label class="meta-box-label" for="course_image">' . __('Course Image URL', 'course-management-tool') . '</label> ';
    echo '<input class="meta-box-field" type="text" id="course_image" name="course_image" value="' . esc_url($course_image) . '" />'; 
   

    // Date field
    $date = get_post_meta($post->ID, 'course_date', true);
    echo '<label class="meta-box-label" for="course_date">' . __('Date', 'course-management-tool') . '</label> ';
    echo '<input class="meta-box-field" type="date" id="course_date" name="course_date" value="' . esc_attr($date) . '" />';

    // Location field
    $location = get_post_meta($post->ID, 'course_location', true);
    echo '<label class="meta-box-label" for="course_location">' . __('Location', 'course-management-tool') . '</label> ';
    echo '<input class="meta-box-field" type="text" id="course_location" name="course_location" value="' . esc_attr($location) . '" />';

}

/**
 * Saves the course details for a given post.
 */

function cm_save_course_details($post_id) {
    if (!isset($_POST['course_details_nonce']) || !wp_verify_nonce($_POST['course_details_nonce'], plugin_basename(__FILE__))) {
        return;
    }

    //Save course name
    if (isset($_POST['course_name'])) {
        update_post_meta($post_id, 'course_name', sanitize_text_field($_POST['course_name']));
    }

    // Save Short Description
    if (isset($_POST['short_description'])) {
        update_post_meta($post_id, 'short_description', sanitize_textarea_field($_POST['short_description']));
    }

    // Save Course Description
    if (isset($_POST['course_description'])) {
        update_post_meta($post_id, 'course_description', sanitize_textarea_field($_POST['course_description']));
    }

    // Save Course Image
    if (isset($_POST['course_image'])) {
        update_post_meta($post_id, 'course_image', esc_url_raw($_POST['course_image']));
    }

    // Save Date
    if (isset($_POST['course_date'])) {
        update_post_meta($post_id, 'course_date', sanitize_text_field($_POST['course_date']));
    }
    // Save Location
    if (isset($_POST['course_location'])) {
        update_post_meta($post_id, 'course_location', sanitize_text_field($_POST['course_location']));
    }

}
add_action('save_post', 'cm_save_course_details');
?>