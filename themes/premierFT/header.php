<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package awps
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Source+Serif+Pro" rel="stylesheet">
	<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
	<link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script async defer src="//assets.pinterest.com/js/pinit.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site" <?php echo ! is_customize_preview() ?: 'style="padding: 0 40px;"'; ?>>

		<header id="masthead" class="site-header" role="banner">

			<?php if ( is_customize_preview() ) echo '<div id="awps-header-control"></div>'; ?>


		</header><!-- #masthead -->

    <div class="top-block">

	<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header mobile-only">

					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
						<i class="fa fa-bars" aria-hidden="true"><span class="sr-only">Toggle navigation</span></i>&nbsp;&nbsp;&nbsp;Menu
					</button>

					<i class="fa fa-shopping-cart default-cursor cart-icon mobile-only" title="Your cart is empty"></i>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="navbar-collapse desktop-only" id="navbar-collapse-1">

						<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php
							if ( has_nav_menu( 'primary' ) ) :
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_id' => 'primary-menu',
									'menu_class' => 'nav',
									'walker' => new Awps\Core\WalkerNav(),
								) );
							endif;
							?>
						</nav>

		</div><!-- /.navbar-collapse -->

 </div><!-- /.container-fluid -->
    </nav>

	</div><!-- /.top-block -->

						<div class="site-branding aligncenter">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->


	<div id="content" class="site-content">
