<?php
function university_post_types() {
    register_post_type('event', array(
        'rewrite' => array('slug' => 'events'),
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => __('Add New Event'),
            'edit_item' => __('Edit Event'),
            'all_items' => __('All Events'),
            'singular_name' => 'Event',
        ),
        'menu_icon' => 'dashicons-calendar',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'excerpt'),
    ));

    register_post_type('program', array(
        'rewrite' => array('slug' => 'programs'),
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Programs',
            'add_new_item' => __('Add New Program'),
            'edit_item' => __('Edit Program'),
            'all_items' => __('All Programs'),
            'singular_name' => 'Program',
        ),
        'menu_icon' => 'dashicons-awards',
        'has_archive' => true,
        'supports' => array('title', 'editor'),
    ));

    register_post_type('professor', array(
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Professors',
            'add_new_item' => __('Add New Professor'),
            'edit_item' => __('Edit Professor'),
            'all_items' => __('All Professors'),
            'singular_name' => 'Professor',
        ),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

add_action('init', 'university_post_types');