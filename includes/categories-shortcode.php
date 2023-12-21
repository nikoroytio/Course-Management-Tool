<?php

function cmt_list_courses_by_category($atts) {
    // Shortcode attributes with defaults
    $attributes = shortcode_atts(array(
        'category' => '', // Default category to empty
    ), $atts);

    // Begin output buffering to collect HTML
    ob_start();

    // Set up custom query
    $arguments = array(
        'post_type' => 'course', // Your custom post type
        'posts_per_page' => -1, // Retrieve all courses
        'tax_query' => array(
            array(
                'taxonomy' => 'course_category', 
                'field' => 'slug', 
                'terms' => $attributes['category'], // The category passed via the shortcode attribute
            ),
        ),
    );

    $course_query = new WP_Query($arguments);

    // Check if the query has posts
    if ($course_query->have_posts()) {
        echo '<ul class="cmt-course-list" style="display: flex; flex-wrap: wrap; justify-content: space-between; list-style-type: none;">'; //we are using inline css here for clarity when testing, these can be modified to your need when you use this plugin in your theme
        while ($course_query->have_posts()) {
            $course_query->the_post();
            
            // Retrieve attributes that are builtin in Wordpress post
            $course_name = get_the_title();
            $course_excerpt = get_the_excerpt();
            $course_thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            $post_id = get_the_ID(); // Get the current post ID
            // Get the permalink for the current post
            $permalink = get_permalink();
            $date = get_post_meta($post_id, 'course_date', true);
            $location = get_post_meta($post_id, 'course_location', true);

            // Output the HTML for each course
            echo '<li style="margin: 10px; padding: 10px; border: 1px solid #ccc; text-align: center;">'; //we are using inline css here for clarity when testing, these can be modified to your need when you use this plugin in your theme
            if ($course_thumbnail) {
                echo '<a href="'. esc_url($permalink) .'">';
                echo '<img src="' . esc_url($course_thumbnail) . '" alt="' . esc_attr($course_name) . '" style="max-width: 300px;"/>'; // Course Image
                echo '</a>';
            }
            echo '<h2>' . esc_html($course_name) . '</h2>'; // Course Name
            if ($date) {
                echo '<p>Date: ' . esc_html($date) . '</p>'; // Course Date
            }
            if ($location) {
                echo '<p>Location: ' . esc_html($location) . '</p>'; // Course Location
            }
            echo '<p>' . esc_html( $course_excerpt) . '</p>'; // Short Description

            echo '<a href="'. esc_url($permalink) .'" class="button">View details</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No courses found in this category.</p>';
    }

    // Restore original post data to avoid conflicts
    wp_reset_postdata();

    // Return the collected output
    return ob_get_clean();
}
add_shortcode('list_courses', 'cmt_list_courses_by_category');

?>