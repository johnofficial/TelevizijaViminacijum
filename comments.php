<?php 

	if( post_password_required() ):
		return;
	endif;
 ?>

 <div id="comments" class="comments-area">

	<?php if( have_comments() ):  ?>
		<h2 class="comment-title">
			<?php 
				printf(
					esc_html(_nx('Jedan komentar za &ldquo;%2$s&rdquo;', '%1$s komentara za &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title' ), 'tvviminacium'),
					number_format_i18n(get_comments_number()),
					'<span>'.get_the_title(). '</span>'
					);
			 ?>
		</h2>
	<!-- COMMENT PAGINATION -->
	<?php 
	/*
		<?php if( get_comment_pages_count() > 1 AND get_option('page_comments')): ?>
			<nav id="comment-nav-top" class="comment-navigation" role="navigaton" >
				<h3><?php esc_html_e('Navigacija', 'tvviminacium' ); ?></h3>
				<div class="nav-link">
					
				</div>
			</nav>
		<?php endif; ?>
		*/
	 ?>
	<!-- END COMMENT PAGINATION -->
		<ol class="comment-list">
			<?php
				$args = array(
					'walker' 			=> null,
					'max_depth' 		=> '',
					'style'				=> 'ol',
					'callback'			=> null,
					'end-callback'  	=> null,
					'type'				=> 'all',
					'replay_text'		=> 'Odgovori',
					'page'				=> '',
					'per_page'			=> '',
					'avatar_size'		=> 38,
					'reverse_top_level'	=> null,
					'reverse_children'	=> '',
					'format'			=> 'html5',
					'short_ping'		=> false,
					'echo'				=> true
					);
			 	wp_list_comments( $args );

			 ?>
		</ol>

		<?php if( !comments_open() AND get_comments_number() ):  ?>
			<p class="no-comments"><?php esc_html_e('Komentari su zatvoreni.','tvviminacium'); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<?php
		$fields = array(
			'author' => '<div class="form-group">
							<label for="author">' . __( 'Name', 'domainreference' ) . '</label> 
							<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" />
						</div>',

			'email' => '<div class="form-group">
						<label for="email">' . __( 'Email', 'domainreference' ) . '</label> 
						<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" />
						</div>'
			);
		$args = array(
			'class_submit' 		=> 'submit-button' , 
			'label_submit'		=> ('Potvrdi Komentar'),
			'fields'			=> apply_filters('comment_form_default_fields', $fields )
		); 
		comment_form($args); 
	?> 	
 </div><!-- .comments-area -->
