<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bgmea
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!--css stylesheet block START -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- css stylesheet block ENDS -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>
<?php wp_body_open(); ?>
<header id="masthead" class="site-header">
<div class="d_menu_header">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-6">
					<a href="<?php echo get_home_url(); ?>"><img class="d_header_logo" src="<?php echo get_template_directory_uri(); ?>/Images/bdfactlogo-min.png" alt="image not found"></a>
				</div>
			<div class="col-xs-6 col-md-6">
				<div class="d_top_buttons">
					<button class="d_button button1">English Version</button>
				</div>
				<div class="d_top_social">
					<button class="d_d_button button2">Donate</button>
					<a href="https://www.facebook.com/bdfactcheck/" target="_blank"><i class="fa fa-facebook-square d_s_icon"></i></a>
					<a href="https://twitter.com/BDFactChecks" target="_blank"><i class="fa fa-twitter-square d_s_icon"></i></a>
					<a href=""><i class="fa fa-instagram d_s_icon"></i></a>
					<a href="" target="_blank"><i class="fa fa-youtube-square d_s_icon"></i></a>
					<img src="<?php echo get_template_directory_uri(); ?>/Images/search.png" class="d-none d-sm-block d_search_img">

				</div>
				<div class="d-none d-sm-block d_search_pos">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div class="container d_main_menu" id="d_sticky_nav">
				<div class="row">
						<div class="col-lg-12">
								<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
						</div>
				</div>
		</div>
	</div>
</div>

<!-- For Mobile Menu -->
<div class="container d-md-none">
	<div class="row">
		<div class="col-12 d-md-none">
			<div class="d_mobile_button">
				<button class="d_m_button button1">English</button>
				<button class="d_m_button button2">Donate</button>
				<div class="d_m_top_social">
					<img src="<?php echo get_template_directory_uri(); ?>/images/search.png" class="d_search_img">
				</div>
			</div>

			<div class="d_search_pos">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>



</header><!-- #masthead -->
