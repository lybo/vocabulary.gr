require(['backbone', 'jquery', 'underscore', 'module/global', 'bootstrap', 'form', 'imgareaselect'],  function(Backbone, $, _, Global){
	
	Global.general();


	$("#user_details").validate({
		rules: {
			last_name: "required",
            first_name: "required",
            username: "required"
		},
		messages: {
			last_name: "Please type your last name",
            first_name: "Please type your first name",
            username: "Please type your username"
		}
	});

	$("#change_password").validate({
		rules: {
			old_password: {
				required: true
 				,remote: "/confirm_password/"
            },
                password: {
				required: true,
				minlength: 5
			},
            password2: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			}
		},
		messages: {
			old_password: {
				required: "Please type your current password",
				remote: "The given password is no equal with your current password"
			},
			password: {
				required: "Please type your new password",
				minlength: "The password is required at least 5 characters"
			},
			password2: {
				required: "Please type your new password again",
				minlength: "The password is required at least 5 characters",
				equalTo: "Please enter the same password again"
			},
		}
	});

	$("#change_email").validate({
		rules: {
			old_email: {
				required: true
 				,remote: "/confirm_email/"
            },
            email: {
				required: true
			},
            email2: {
				required: true,
				equalTo: "#email"
			}
		},
		messages: {
			old_email: {
				required: "Please type your current email",
				remote: "The given email is no equal with your current email"
			},
			email:  "Please type your new email",
			email2: {
				required: "Please type your new again",
				equalTo: "Please enter the same email again"
			},
		}
	});

	var bar = $('.bar');
	var percent = $('.percent');
	var image_dimensions = {};
	   
	$('#user_image').ajaxForm({
	    beforeSend: function() {
	        
	        var percentVal = '0%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    success: function() {
	        var percentVal = '100%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
		complete: function(xhr) {
			
			var obj = eval("(" + xhr.responseText + ')');
			
			if(typeof obj.file_name !== 'undefined') {
				

				$("#uploadImage").modal('hide');
				$("#cropImage").modal('show');
				//$("#crop").show();
				$("#jcrop_target").attr('src','http://www.vocabulary.gr/images/users/'+obj.file_name+'?'+Math.random());
				$("#preview").attr('src','http://www.vocabulary.gr/images/users/'+obj.file_name+'?'+Math.random());

				var img = new Image();
				img.onload = function() {

					image_dimensions = {
						width: this.width,
						height: this.height
					};

					$("#jcrop_target_parent").css({
						'width':image_dimensions.width,
						'height':image_dimensions.height
					}),

					$("#crop_details").show();
					$('#jcrop_target').imgAreaSelect({
				        handles: true,
				        aspectRatio: '1:1',
				        zIndex: 10000,
				        x1: 0, y1: 0, x2: 60, y2: 60,
				        parent: '#crop_details',
				        onSelectChange: function showPreview(img, selection){
					        var scaleX = 60 / (selection.width || 1);
						    var scaleY = 60 / (selection.height || 1);
						  
						    $('#preview').css({
						        width: Math.round(scaleX * image_dimensions.width) + 'px',
						        height: Math.round(scaleY * image_dimensions.height) + 'px',
						        marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px',
						        marginTop: '-' + Math.round(scaleY * selection.y1) + 'px'
						    });

						    $('input[name="x1"]').val(selection.x1);
				            $('input[name="y1"]').val(selection.y1);
				            $('input[name="x2"]').val(selection.x2);
				            $('input[name="y2"]').val(selection.y2);   
				            $('input[name="w"]').val(selection.width);
				            $('input[name="h"]').val(selection.height);   
				        },
				        onSelectEnd: function (img, selection) {
				            $('input[name="x1"]').val(selection.x1);
				            $('input[name="y1"]').val(selection.y1);
				            $('input[name="x2"]').val(selection.x2);
				            $('input[name="y2"]').val(selection.y2); 
				            $('input[name="w"]').val(selection.width);
				            $('input[name="h"]').val(selection.height);
				        }
				        
				    });

					

					

				}
				img.src = 'http://www.vocabulary.gr/images/users/'+obj.file_name+'?'+Math.random();

			} else if(typeof obj.error !== 'undefined') {
				alert(obj.error);
			} else {
				alert(xhr.responseText);
			}
		}
	});

	
	$('#user_image_crop').ajaxForm({
	    beforeSend: function() {
	        
	        var percentVal = '0%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    uploadProgress: function(event, position, total, percentComplete) {
	        var percentVal = percentComplete + '%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
	    success: function() {
	        var percentVal = '100%';
	        bar.width(percentVal)
	        percent.html(percentVal);
	    },
		complete: function(xhr) {
			
			var obj = eval("(" + xhr.responseText + ')');
			
			if(typeof obj.success !== 'undefined') {
				
				$("#user-image").attr('src',obj.file_name+'?'+Math.random());
				

				$("#crop_details").hide();
				$("#cropImage").modal('hide');

			} else if(typeof obj.error !== 'undefined') {
				alert(obj.error);
			} else {
				alert(xhr.responseText);
			}
		}
	});

    Backbone.history.start({});
});