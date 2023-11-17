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
				// Include WooCommerce product archive content
				echo do_shortcode('[products]');
			?>
		</div>
		
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
