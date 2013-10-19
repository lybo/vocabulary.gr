require(
	['backbone', 'jquery', 'underscore', 'module/applibrary', 'module/router', 'module/global'], 
	function(Backbone, $, _, AppLibrary, Router, Global){
	
	Global.general();

	window.vent = _.extend({}, Backbone.Events);
	var router = new Router();
	var appView = new AppLibrary.View({ 'vocabularies': vocabularies, 'users': users, 'langs': langs });

    Backbone.history.start({});
});