<?php get_header(); ?>


	<div class="content">
			
		<main>
					<?php 
		
				if( have_posts() ):
			
					while( have_posts() ): the_post(); ?>
				
					<?php get_template_part('content', 'search'); ?>
			
			<?php endwhile;
			
		endif;
				
		?>

		</main>
		
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/add-1.png' ?>">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>

		
		
	</div>


	
<?php get_footer(); ?>