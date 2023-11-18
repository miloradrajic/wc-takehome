<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wc-takehome' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="headerTop container">
			<div class="site-branding">
				<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$starter_description = get_bloginfo( 'description', 'display' );
					if ( $starter_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $starter_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
			</div><!-- .site-branding -->

			<div class="loginLink">
				<?php custom_login_link(); ?>
			</div><!-- .loginLink -->
			<?php
			// Check if polylang plugin is active 
			if ( function_exists( 'pll_the_languages' ) ) { 
				?>
				<div class="languageSwitcher">
					<ul>
						<?php 
							pll_the_languages( 
								array( 
									'dropdown' => 0, 
									'hide_current' => 1, 
									'show_flags' => 1, 
									'show_names' => 0,
								) 
							); 
						?>
					</ul>
				</div>
			<?php } ?>
			<?php // Show cart
			// Check if WooCommerce is active
			if (class_exists('WooCommerce')){
				global $woocommerce;
				?>
				<div class="cart-wrapper">
					<a class="cart-link" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'wc-takehome'); ?>">
						<?php
						$item_count = $woocommerce->cart->get_cart_contents_count();
						$cart_icon = '<span class="dashicons dashicons-cart"></span>';
						echo $cart_icon;
						if ($item_count > 0) { ?>
							<span class="cart-count"><?php echo esc_html($item_count); ?></span>
							<?php
						} ?>
					</a>
				</div><!-- .cart-wrapper -->
				<?php 
			}; ?>
		</div><!-- .headerTop -->

		<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<div class="navWrapper">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php _e( 'Primary Menu', 'wc-takehome' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>
					<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'navbarSupportedContent',
						'menu_class'		 => 'collapse navbar-collapse'
						)
					);
					?>
				</div>
			</div><!-- .container -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
