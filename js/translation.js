require(
	['backbone', 'jquery', 'underscore', 'module/apptranslation', 'module/router', 'module/global'], 
	function(Backbone, $, _, AppTranslation, Router, Global){

	Global.general();
	
	window.vent = _.extend({}, Backbone.Events);
	var router = new Router();
	var appView = new AppTranslation.View({ 'translations': window.translations, 'vocabulary': window.vocabulary, 'langs': window.langs });

    Backbone.history.start({});
});