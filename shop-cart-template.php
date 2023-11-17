<?php
/*
Template Name: Custom Cart page Template
*/
get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<?php
			while ( have_posts() ) :
					the_post();
          $current_language = pll_current_language();
          // Get the main language code
          $main_language = pll_default_language(); // This function returns the main language code
    
          // Check if the current language is not the main language
          if ($current_language !== $main_language) { ?>
            <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>	
            </header>
            <div class="woocommerce">
              <div class="woocommerce-notices-wrapper"></div>
              <?php 
              $cart_count = WC()->cart->get_cart_contents_count();

              // Check if the cart is empty
              if ($cart_count === 0) {
                // If the cart is empty, use the empty_cart template
                wc_get_template_part('cart/cart-empty');
              } else {
                wc_get_template_part('cart/cart');
              } 
              ?>
            </div><!-- .woocommerce -->
            <?php
          }else{
            get_template_part( 'template-parts/content', 'page' );

          }
      endwhile; // End of the loop.
			?>
		</div><!-- .container -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
