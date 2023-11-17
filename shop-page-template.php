<?php
/*
Template Name: Custom Shop page Template
*/
?>

<?php get_header(); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main4" role="main">

		<div class="container">
			<?php
				// Get the ID of the WooCommerce shop page
				$shop_page_id = wc_get_page_id('shop'); 
				$shopPost = get_post($shop_page_id);

				?>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo get_the_title($shop_page_id); ?></h1>	
					</header>
				<?php	
				
				echo $shopPost->post_content;
				// Include WooCommerce product archive content
				echo do_shortcode('[products]');
			?>
		</div>
		
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
