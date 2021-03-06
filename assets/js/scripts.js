
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    
    /*
        Forms show / hide
    */
    $('.show-register-form').on('click', function(){
    	if( ! $(this).hasClass('active') ) {
			$('.show-login-form').removeClass('active');						
    		$('.show-register-form2').removeClass('active');
			$(this).addClass('active');			
			$('.register-form2').hide();
    		$('.login-form').fadeOut('fast', function(){
    			$('.register-form').fadeIn('fast');
    		});
    	}
	});
	
	$('.show-register-form2').on('click', function(){
    	if( ! $(this).hasClass('active') ) {
			$('.show-login-form').removeClass('active');			
    		$('.show-register-form').removeClass('active');
			$(this).addClass('active');			
			$('.register-form').hide();
    		$('.login-form').fadeOut('fast', function(){
    			$('.register-form2').fadeIn('fast');
    		});
    	}
    });
    // ---
    $('.show-login-form').on('click', function(){
    	if( ! $(this).hasClass('active') ) {
			$('.show-register-form').removeClass('active');						
    		$('.show-register-form2').removeClass('active');
			$(this).addClass('active');
			$('.register-form2').hide();
    		$('.register-form').fadeOut('fast', function(){
    			$('.login-form').fadeIn('fast');
			});
		}
		
    });
    
    /*
        Login form validation
    */
    $('.l-form input[type="text"], .l-form input[type="password"], .l-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.l-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    /*
        Registration form validation
    */
    $('.r-form input[type="text"], .r-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.r-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
    
});
