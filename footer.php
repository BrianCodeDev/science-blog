<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!-- col -->

		</div><!-- .row -->

	</div><!-- .container(-fluid) -->

</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->
<script>
	jQuery(document).ready(function($) {
    let currentSlide = 0;
    const slides = $('.newest-blog-post .latest-post-wrapper');
    const totalSlides = slides.length;

    // Initially hide all slides except the first one
    slides.hide();
    slides.eq(currentSlide).show();

    $('#next-post').click(function() {
        slides.eq(currentSlide).fadeOut(400, function() {
            currentSlide = (currentSlide + 1) % totalSlides; // Move to next slide
            slides.eq(currentSlide).fadeIn(400); // Show the next slide
        });
    });

    $('#prev-post').click(function() {
        slides.eq(currentSlide).fadeOut(400, function() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; // Move to previous slide
            slides.eq(currentSlide).fadeIn(400); // Show the previous slide
        });
    });
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php wp_footer(); ?>

</body>

</html>

