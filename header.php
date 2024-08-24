<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap4' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <img src="http://science-blog.local/wp-content/uploads/2024/08/a8TRKU-science-beaker-clipart-getdrawings-free-download.png" alt="logo" width="50px" height="50px">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">New Blog Works</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
        <button class="subscribe-button" type="submit">Subscribe</button>
      </form>
    </div>
  </div>
</nav>
<div class="center-text">
	<h2>Sign Up for Our Ideas Newsletter POV</h2>
</div>
<div class="container">
<div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="gradient-overlay">
    <div class="newest-blog-post">
        <?php echo do_shortcode('[latest_post posts_per_page="5"]'); ?>
    </div>

</div>
      <div class="carousel-caption d-none d-md-block">

      </div>
    </div>
    <div class="carousel-item">
    <div class="gradient-overlay">
    <div class="newest-blog-post">
        <?php echo do_shortcode('[latest_post posts_per_page="5"]'); ?>
    </div>

</div>
      <div class="carousel-caption d-none d-md-block">

      </div>
    </div>
    <div class="carousel-item">
    <div class="gradient-overlay">
    <div class="newest-blog-post">
        <?php echo do_shortcode('[latest_post posts_per_page="5"]'); ?>
    </div>

</div>
      <div class="carousel-caption d-none d-md-block">

      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<div class="top-left">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">PREV</button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">NEXT</button>
</div>
</div>

