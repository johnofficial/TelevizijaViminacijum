<?php get_header(); ?>
<!-- O nama -->

<div class="content">
			
		<main>
				<div class="about-page">
					
					<?php if( have_posts() ): ?> 
						<?php while( have_posts() ): the_post(); ?>	
							<h1>	<?php the_title(); ?>	</h1>

							<p><?php the_content(); ?></p>

						<?php endwhile; ?>
					<?php endif; ?>

				</div>
		</main>
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/add-1.png' ?>">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>
</div>	
<?php get_footer(); ?>