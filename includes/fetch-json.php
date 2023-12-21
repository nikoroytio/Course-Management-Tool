<?php

// Function to fetch and update courses
function cmt_update_courses_from_json() {
    $json_url = 'https://example.com/courses.json'; // URL to the JSON file
    $response = wp_remote_get($json_url);

    if (is_wp_error($response)) {
        // Handle error
        return;
    }

    $body = wp_remote_retrieve_body($response);
    $courses = json_decode($body);

    if (is_null($courses)) {
        // Handle error
        return;
    }

    foreach ($courses as $course) {
        $post_id = cmt_get_course_by_external_id($course->id);

        $post_data = array(
            'post_title'   => wp_strip_all_tags($course->name),
            'post_content' => $course->description,
            'post_status'  => 'publish',
            'post_type'    => 'course',
            // Add other post data as needed
        );

        if ($post_id) {
            // Update existing post
            $post_data['ID'] = $post_id;
            wp_update_post($post_data);
        } else {
            // Insert new post
            $post_id = wp_insert_post($post_data);
            // Save the external ID as post meta for future reference
            update_post_meta($post_id, 'external_id', $course->id);
        }

        // Handle other course details like image, datetime, location...
    }
}

// Function to get course post by external ID
function cmt_get_course_by_external_id($external_id) {
    $query = new WP_Query(array(
        'post_type'  => 'course',
        'meta_query' => array(
            array(
                'key'   => 'external_id',
                'value' => $external_id,
            ),
        ),
        'posts_per_page' => 1,
    ));

    if ($query->have_posts()) {
        return $query->posts[0]->ID;
    }

    return false;
}

// Schedule the update function to run daily (or at another interval)
if (!wp_next_scheduled('cmt_update_courses_event')) {
    wp_schedule_event(time(), 'daily', 'cmt_update_courses_event');
}
add_action('cmt_update_courses_event', 'cmt_update_courses_from_json');

?>