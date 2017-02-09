<?php get_header(); ?>
<!-- Video -->

	<div class="content">
			
		<main>
					<?php $VideoNews = new WP_Query('type=post&posts_per_page=-1&cat=7') ?>
					<?php if( $VideoNews->have_posts() ): ?> 
						<?php while( $VideoNews->have_posts() ): $VideoNews->the_post(); ?>
														
								<?php get_template_part('content'); ?>	

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>

		</main>
		
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>

		
		
	</div>
<?php get_footer(); ?>