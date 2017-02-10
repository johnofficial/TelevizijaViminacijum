 jQuery(function(){
  mobileMenu();
  contactForm();
});


function mobileMenu(){
  $(".mobile-nav-toggle").on('click', function(){
    var status = $(this).hasClass('is-open');
    if(status){
      $(".mobile-nav-toggle, .mobile-navigation").removeClass("is-open");
    }else{
      $(".mobile-nav-toggle, .mobile-navigation").addClass("is-open");
    }
});
}
function contactForm(){
	$('#viminaciumContactForm').on('submit', function(e){
		e.preventDefault();

		$('.error').removeClass('error');

		var form 		= $(this),
			name 		= form.find('#name').val(),
			email		= form.find('#email').val(),
			message		= form.find('#message').val(),
			ajaxurl		= form.data('url');


			if( name === ''){
				$('#name').addClass('error');
				return;
			}
			if( email === ''){
				$('#email').addClass('error');
				return;
			}
			if( message === ''){
				$('#message').addClass('error');
				return;
			}

			form.find('input, button, textarea').attr('disabled', 'disabled');

			$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				name : name,
				email : email,
				message : message,
				action: 'viminacium_save_user_contact_form'
				
			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){
				if( response == 0){
					$('.non-success').removeClass('hide');
				}else{
					$('.success').removeClass('hide');
				}
			}
			
		});
	});
}