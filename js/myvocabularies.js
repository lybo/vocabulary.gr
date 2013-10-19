require(
	['backbone', 'jquery', 'underscore', 'module/appmyvocabulary', 'module/router', 'module/global'], 
	function(Backbone, $, _, AppMyVocabulary, Router, Global){
	
	Global.general();

	window.vent = _.extend({}, Backbone.Events);
	var router = new Router();
	var appView = new AppMyVocabulary.View({ 'vocabularies': vocabularies, 'users': users, 'langs': langs });

    Backbone.history.start({});
});