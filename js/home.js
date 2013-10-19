require(['backbone', 'jquery', 'underscore', 'module/global', 'bootstrap'],  function(Backbone, $, _, Global){
	
	Global.general();
	Global.signup();


	$('#whatisvocabulary').on('show', function () {
  		$('.modal-body', this).html('<center><iframe width="560" height="315" src="//www.youtube.com/embed/RJa8EySRzWY?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe></center>');
	});

	$('#whatisvocabulary').on('hide', function () {
  		$('.modal-body', this).html('');
	});

	/*$("#last_users_vocabularies .vocabulary div.inner").each(function(){
		var this_ = $(this),
			innerHeight = this_.innerHeight(),
			parentHeight = this_.parent().innerHeight()
		;

		if( innerHeight >= parentHeight  ) {
			this_.find('p').html();
		}

	});*/

    Backbone.history.start({});
});