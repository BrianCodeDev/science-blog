<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}
function my_theme_enqueue_styles() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
    
    // Enqueue theme's main stylesheet
    wp_enqueue_style('theme-style', get_stylesheet_uri(), array('bootstrap-css'), '1.0');
    
    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function display_latest_post() {
    // Query for the latest post
    $args = array(
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    );
    $latest_post_query = new WP_Query($args);

    if ($latest_post_query->have_posts()) {
        $latest_post_query->the_post();
        $post_title = get_the_title();
        $post_content = get_the_content(); // Get full content
        $post_excerpt = wp_trim_words($post_content, 40, '...'); // Trim content to a specific length
        $post_permalink = get_permalink();
        $post_author = get_the_author(); // Get the author's name
        $post_author_id = get_the_author_meta('ID'); // Get the author's ID
        $post_author_avatar = get_avatar($post_author_id, 64); // Get the author's avatar with size 64x64
        $post_date = get_the_date('F j, Y'); // Format date as "January 21, 2021"
        $read_time = ceil(str_word_count(strip_tags($post_content)) / 200) . ' min read'; // Estimate read time
        $post_thumbnail = get_the_post_thumbnail(null, 'thumbnail', array('class' => 'post-thumbnail')); // Get the post thumbnail

        // Generate the output
        $output = '<div class="latest-post-wrapper">';
        $output .= $post_thumbnail; // Display the post thumbnail on the right
        $output .= '<h2 class="title-post"><a href="' . esc_url($post_permalink) . '">' . esc_html($post_title) . '</a></h2>';
        $output .= '<p class="paragraph-post">' . esc_html($post_excerpt) . '</p>'; // Display trimmed content
        $output .= '<div class="header-post">';
        $output .= '<div class="header-post-one">';
        $output .= '<div class="post-author">';
        $output .= $post_author_avatar . ' <p><strong>' . esc_html($post_author) . '</strong></p>';
        $output .= '<p class="post-date">' . esc_html($post_date) . ' • ' . esc_html($read_time) . '</p>'; // Display date and read time below the author's name
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<div class="header-post-two">';
        $output .= '<a class="btn btn-secondary understrap-read-more-link" href="' . esc_url($post_permalink) . '">Read More...</a>'; // Read More button
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No posts found.</p>';
    }
}
add_shortcode('latest_post', 'display_latest_post');







