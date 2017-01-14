<?php get_header(); ?>
<!-- VESTI -->


	<div class="content">
			
		<main>
					<?php $News = new WP_Query('type=post&posts_per_page=-1') ?>
					<?php if( $News->have_posts() ): ?> 
						<?php while( $News->have_posts() ): $News->the_post(); ?>
														
								<?php get_template_part('content'); ?>	

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

		</main>
		
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/add-1.png' ?>">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>

		
		
	</div>
<?php get_footer(); ?>