<?php
/*
Template Name: Custom Checkout page Template
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
          if ($current_language !== $main_language) {
            ?>
            <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>	
            </header>
            <div class="woocommerce">
              <?php wc_get_template('checkout/form-checkout.php'); ?>
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
