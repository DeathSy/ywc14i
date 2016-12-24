<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	
	<?php 
	if (is_active_sidebar( 'banner' )) {
		echo '<div class="site-banner">';
		dynamic_sidebar( 'banner' );
		echo '</div>';
	} else {
		if (get_header_image() != '') { 
			echo '<div class="site-banner"><img src="' . get_header_image() . '" alt="banner"></div>';
		}
	}
	?>
	

	<?php if ( is_home() ) : /* Show Blog List */ ?>
		<div class="home-blog-space"></div>
		<div class="container">
			<div id="primary" class="content-area <?php echo '-'.SEED_BLOG_LAYOUT; ?>">
				<main id="main" class="site-main" role="main">
					
					<?php 
					if ((int)SEED_BLOG_COLUMNS > 1) {
						echo '<div class="seed-grid-'.SEED_BLOG_COLUMNS.'">';
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content','card-excerpt');
						endwhile; 
						echo '</div>';
					} else {
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content');
						endwhile; 
					}
					?>
					<?php seed_posts_navigation(); ?>
					
				</main>
			</div><!--primary-->
			<?php 
			switch (SEED_BLOG_LAYOUT) {
				case 'rightbar':
				get_sidebar('right'); 
				break;
				case 'leftbar':
				get_sidebar('left'); 
				break;
				case 'full-width':
				break;
				default:
				break;
			}
			?>
		</div><!--container-->
	<?php else: /* Show Page Content */ ?>
		<div class="home-section -main">
			<div class="section_intro">
				<div class="container">
					<div class="row">
						<div class="col-md-4">111</div>
						<div class="col-md-4">111</div>
						<div class="col-md-4">111</div>
					</div>
					<div class="row">
						<div class="col-md-4">111</div>
						<div class="col-md-4">111</div>
						<div class="col-md-4">111</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php 
/*
<div class="home-section -news">
	<div class="container">
		<h2>Recent News</h2>
		<?php 
			$args = array(
				// 'post_type' => 'post',
				// 'category_name' => 'news',
				'posts_per_page' => 4
				);
			$the_query = new WP_Query( $args );
		?>

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

		<?php get_template_part( 'template-parts/content', '' ); ?>

		<?php endwhile; wp_reset_postdata(); ?>
	</div><!--container-->
</div><!--home-section-->
*/
?>

</main><!--.site-main-->

<?php get_footer(); ?>