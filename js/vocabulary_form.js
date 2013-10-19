require(
	['backbone', 'jquery', 'underscore', 'module/global', 'tags_input_master', 'validation',], 
	function(Backbone, $, _, Global){
	
	Global.general();

	$("#inputAddLabels").tagsInput();

	$("#selectAddLang2").val(currentUser.lang_id);

	infoSource($('input[value=1]'));
	$('body').on('change', "input[name=type_id]", function(){
		infoSource($(this));
	});

	function infoSource (el){
		var this_ = el,
			val = this_.val(),
			info = this_.data('info')
		;
		
		if( val !== '' ) {
			$("#source_inputs").show();
			$("#textAddSource").attr('class', 'span12');
		} else {
			$("#source_inputs").hide();
			$("#textAddSource").attr('class', 'span12 ignore');
		}

		$("#selection-info")
			.html('<hr/>'+$("#selection-"+info).html())
			//.wrapInner('<div class="well well-small"/>')
		;
	}
	
	
	$("#inputAddSourceUrl")
		.keyup(inputAddSourceUrl)
		.blur(inputAddSourceUrl)
		.focus(inputAddSourceUrl)
	;

	function inputAddSourceUrl(e){
		var this_ = $("#inputAddSourceUrl"),
			val = this_.val().replace('http://', '')
		;
		this_.val(val);
		$("#addSourceUrl").html('<a href="http://'+val+'" target="_blank">'+val+'</a>');
	}
	

	$("#add_vocabulary").validate({
		ignore: ".ignore",
		rules: {
			title: "required",
            lang_1_id: "required",
            lang_2_id: "required",
            source: "required"
		},
		messages: {
			title: "Please type vocabulary's title",
            lang_1_id: "Please select your Study Language",
            lang_2_id: "Please select your Native Language",
            source: "Please type the vocabulary's source"
		}
	});


    Backbone.history.start({});
});