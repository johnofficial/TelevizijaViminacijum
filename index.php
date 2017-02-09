<?php get_header(); ?>


	<div class="content">
			
		<main>
					<?php $lastNews = new WP_Query('type=post&posts_per_page=5') ?>
					<?php if( $lastNews->have_posts() ): ?> 
						<?php while( $lastNews->have_posts() ): $lastNews->the_post(); ?>
														
								<?php get_template_part('content'); ?>	

						<?php endwhile; ?>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<div class="show-all">						
						<a href="wp/vesti/" >ПРИКАЖИ СВЕ ВЕСТИ</a>
					</div>

		</main>
		
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>

		
		
	</div>


	
<?php get_footer(); ?>