define(['backbone', 'jquery', 'underscore',  'module/appsubscribe', 'validation', 'bootstrap'], 
	function(Backbone, $, _, AppSubscribe){

	/* Declaration */
	var Global = {

		refreshInterval: null,
		offset_y: 0,
		
		general: function(){

			if( typeof window.is_logged !== 'undefined' && window.is_logged == 1) {
				var appSubscribeView = new AppSubscribe.View();
			}
			$("#content").css("min-height", $(window).height() - ($('.navbar-fixed-top').innerHeight() + $('footer').height() + 150) );

			$('#adv').affix({ offset: { top: 250 } });
			$('#adv-exercise').affix({ offset: { top: 550 } });

			$("#login").submit(function(){
				$("#return_page").remove();
				$("#login").append('<input type="hidden" name="return_page" value="'+$(location).attr('href')+'" id="return_page" />');
			});

			$("#logout").on('click', function(e){
				e.preventDefault();

				var random = new Date();
				$.ajax({
					type: "POST",
					url: "/logout",
					data: "random="+random,			   
					dataType: "json",
					cache: false,
					success: function(res){
						//alert(res.success +' '+ $(location).attr('href'));
						if(res.success){
							window.location.href = $(location).attr('href');
						}else{
							alert('2Try again please! There was occurred an error.');
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown){
						alert('3Try again please! There was occurred an error.');
					}
				});
			});

			$("#vocabulary-search").submit(function(e){
				e.preventDefault();
				var vocabularyQuery = $(this).find('input').val();
				window.location.href = "/vocabularies/search/"+vocabularyQuery;
			});

			$("#user-vocabulary-search").submit(function(e){
				e.preventDefault();
				var vocabularyQuery = $(this).find('input[name=vocabularyQuery]').val();
				var user_id = $(this).find('input[name=user_id]').val();
				window.location.href = "/vocabularies/user/" + user_id + "/1/search/"+vocabularyQuery;
			});

			

			$("._tooltip").tooltip({
				container: 'body'
			});

			$(".container .brand").mouseover(function(){

				var $el = $(this);

				$el.removeClass('mouseout');

				if( !$el.hasClass('isplaying') && !$el.hasClass('istimer') ){

					$el.addClass('isplaying');
					$el.addClass('mouseover');
				
					Global.refreshInterval =  window.setInterval(function(){
		                $el.css('background-position', '20px -'+Global.offset_y+'px');
		                Global.offset_y = Global.offset_y + 60;
						if(Global.offset_y >= 300) {
							clearInterval(Global.refreshInterval);
							Global.offset_y = 240;
							$el.css('background-position', '20px -'+Global.offset_y+'px');
							$el.removeClass('isplaying');
							

							if ( !$el.hasClass('mouseover') ) {
								//alert('aaaaaaa');
						        $el.trigger('mouseout');
						    }
						}
			        }, 110);
				}

			});

			$(".container .brand").mouseout(function(){

				var $el = $(this);

				$el.removeClass('mouseover');

				if( !$el.hasClass('isplaying') && !$el.hasClass('istimer') ){

					$el.addClass('isplaying');
					$el.addClass('mouseout');
					Global.offset_y = Global.offset_y - 60;
					
					Global.refreshInterval =  window.setInterval(function(){
		                $el.css('background-position', '20px -'+Global.offset_y+'px');
		                Global.offset_y = Global.offset_y - 60;
						if(Global.offset_y <= 0) {
							clearInterval(Global.refreshInterval);
							Global.offset_y = 0;
							$el.css('background-position', '20px 0px');	
							$el.removeClass('isplaying');
							
						}
			        }, 110);
				}

			});

			
			
		},

		signup: function(){

			$("#form-signup-individual").validate({
				rules: {
					signUpemail: {
						required: true,
						email: true
					},
					signUpLanguage: {
						required: true
					},
					signUppassword: {
						required: true,
						minlength: 6
					},
		            signUppassword2: {
						required: true,
						minlength: 6,
						equalTo: "#signUppassword"
					},
		            agree: {
						required: true
					}
				},
				messages: {
					signUpemail: {
						required: "Please type your email ",
						email: "Is not valid email"
					},	
					signUpLanguage: {
						required: "Please select your native language "
					},
					signUppassword: {
						required: "Please type your password",
						minlength: "Is required less 6 characters"
					},
					signUppassword: {
						required: "Please type your password again",
						minlength: "Is required less 6 characters",
						equalTo: "In not the same password"
					},
					agree: {
						required: "Please read the Terms & Conditions"
					}
				}
			});
		},

		login: function(){

			$("#complete-login-form").validate({
				rules: {
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 6
					}
				},
				messages: {
					email: {
						required: "Please type your email ",
						email: "Is not valid email"
					},	
					password: {
						required: "Please type your password",
						minlength: "Is required less 6 characters"
					}
				}
			});
		}


	}

	return Global;
});