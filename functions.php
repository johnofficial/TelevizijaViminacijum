 <?php

/*		Adding assets files		*/	
function add_assets_files(){
	//adding css file
	wp_enqueue_style( 'customstyle', get_template_directory_uri().'/css/main.css', array(), '1.0.0', 'all' );
	//adding jquery file
	wp_enqueue_script( 'customjquery', get_template_directory_uri().'/js/jquery-3.1.1.min.js', array(), '1.0.0', 'true' );
	//adding javascript file
	wp_enqueue_script( 'customjavascript', get_template_directory_uri().'/js/main.js', array(), '1.0.0', 'true' );
}
add_action('wp_enqueue_scripts', 'add_assets_files');


function viminacijum_theme_setup(){	
	//Allows to customise menu
	add_theme_support('menus');
	register_nav_menu( 'primary', 'Primary Header Navigation' );
}
add_action('init', 'viminacijum_theme_setup');



/*		THEME SUPORT 		*/

add_theme_support('html5', array('comment-list','comment-form', 'search-form'));
add_theme_support( 'post-thumbnails' );



/*			MESSAGES		*/

function viminacium_mesages(){
	$labels = array(
		'name'				=> 'Poruke',
		'singular_name'		=> 'Poruka',
		'menu_name'			=> 'Poruke',
		'name_admin_bar'	=> 'Poruka'
		);
	$args = array(
		'labels' 			=> $labels,
		'show_ui' 			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array('title', 'editor', 'author') 
		);
	register_post_type('viminacium-contact', $args );
}
add_action( 'init', 'viminacium_mesages' );
add_filter( 'manage_viminacium-contact_posts_columns', 'viminacium_set_contact_columns' );
add_action( 'manage_viminacium-contact_posts_custom_column', 'viminacium_contact_custom_columns' , 10, 2 );
add_action('add_meta_boxes', 'viminacium_contact_add_meta_box' );


function viminacium_set_contact_columns( $columns ){
	$newColumns 			= array();
	$newColumns['title'] 	= 'Ime';
	$newColumns['message'] 	= 'Poruka';
	$newColumns['email']	= 'Email';
	$newColumns['date']		= 'Datum';
	return $newColumns;
}
function viminacium_contact_custom_columns( $column, $post_id ){
	switch( $column ){
		case 'message':
			echo get_the_excerpt();
			break;
		case 'email':
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo $email;
			break;

	}
}

/* Message-Contact Meta Boxes */
function viminacium_contact_add_meta_box(){
	add_meta_box( 'contact_email', 'User Email', 'viminacium_contact_email_callback', 'viminacium-contact', 'side', 'high');
}
function viminacium_contact_email_callback( $post ){
	wp_nonce_field( 'viminacium_save_contact_email_data', 'viminacium_contact_email_meta_box_nonce' );
	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	echo '<label for="viminacium_contact_email_field">Korisnikova Email Adresa: </label>';
	echo '<input type="email" id="viminacium_contact_email_field" name="viminacium_contact_email_field" value="' . esc_attr( $value ) . '" size="30" />';
}
function viminacium_save_contact_email_data( $post_id ){
	if ( !isset($_POST['viminacium_contact_email_meta_box_nonce'])) {
		return;
	}
	if ( !wp_verify_nonce( $_POST['viminacium_contact_email_meta_box_nonce'], 'viminacium_save_contact_email_data') ) {
		return;
	}
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	if( !current_user_can('edit_post', $post_id )){
		return;
	}
	if( !isset($_POST['viminacium_contact_email_field']) ){
		return;
	}
	$my_data = sanitize_text_field( $_POST['viminacium_contact_email_field'] );
	update_post_meta( $post_id, '_contact_email_value_key', $my_data  );
}
add_action( 'save_post', 'viminacium_save_contact_email_data' );


/* AJAX FUNCTIONS */
add_action('wp_ajax_nopriv_viminacium_save_user_contact_form', 'viminacium_save_contact');
add_action('wp_ajax_viminacium_save_user_contact_form', 'viminacium_save_contact');

function viminacium_save_contact(){
	$title = wp_strip_all_tags($_POST["name"]);
	$email = wp_strip_all_tags($_POST["email"]);
	$message = wp_strip_all_tags($_POST["message"]);
	$args = array(
		'post_title' => $title,
		'post_content' => $message,
		'post_author' => 1,
		'post_status' => 'publish',
		'post_type' => 'viminacium-contact',
		'meta_input' => array(
			'_contact_email_value_key' => $email
		)
	);
	$postID = wp_insert_post( $args );
	echo $postID;
	die();
}
















/*		REMOVING TRASH CODE THAT WP ADD 		*/

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//WEBLOG CLIENT LINK
remove_action ('wp_head', 'rsd_link');
//Windows Live Writer Manifest Link
remove_action( 'wp_head', 'wlwmanifest_link');
//WordPress Generator (with version information)
remove_action('wp_head', 'wp_generator');

/*		END REMOVING TRASH CODE THAT WP ADD			*/