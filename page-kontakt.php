<?php get_header(); ?>
<!-- KONTAKT -->

	<div class="content">
			
		<main class="contact-page">
			<form id="viminaciumContactForm" action="" method="post" class="contact-form" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
			
				<input type="text" class="form-control" placeholder="Vaše ime" id="name" name="name" >


				<input type="email" class="form-control" placeholder="Vaš e-mail" id="email" name="email" >

				<textarea name="message" id="message" class="form-control"  placeholder="Poruka"></textarea>

				<button type="submit" class="button">Pošalji</button>
				<small class="success hide">Порука успешно послата.</small>
				<small class="non-success hide">Порука није послата, покушајте касније!</small>
			</form>
		</main>
		
		<section class="side-bar">
			<img src="<?php echo get_template_directory_uri().'/img/web-design.png' ?>">
		</section>

		
		
	</div>


<?php get_footer(); ?>