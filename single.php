<?php get_header(); ?>
<!--Single Post Themplate -->



	<div class="content">
			
		<main>
				
			<?php if( have_posts() ): ?> 
				<?php while( have_posts() ): the_post(); ?>	

				<article class="single-post">

				
					
					<div class="single-post-thumbnail"> 						
						<?php the_post_thumbnail(); ?>

					<div class="single-post-title">
					 	<h1> <?php the_title(); ?> </h1>
					</div>
					</div>

			

					<div class="single-post-content">	<?php the_content(); ?>	</div>

				<hr>

					<div class="single-post-comments">				
						<?php if( comments_open() ): comments_template(); endif; ?>
					</div>
				
				</article>	

				<?php endwhile; ?>
			<?php endif; ?>

		</main>
		
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>

		
		
	</div>

<?php get_footer(); ?>