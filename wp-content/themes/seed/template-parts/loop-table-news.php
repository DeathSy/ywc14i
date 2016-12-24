<?php
/**
 * Loop Name: News Table
 */
?>
<?php if ( have_posts() ) : ?>
	<div class="table-responsive">
		<table class="table">

			<?php while ( have_posts() ) : the_post(); ?>

				<tr>
					<td><?php echo get_the_date(); ?></td>
					<td><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?></td>
				</tr>			

				<?php endwhile; ?>

			</table>
		</div>

	<?php endif; ?>