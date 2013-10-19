require(
	['backbone', 'jquery', 'underscore', 'module/appexercise', 'module/router'], 
	function(Backbone, $, _, AppExercise, Router){
	
	//Global.general();

	window.vent = _.extend({}, Backbone.Events);
	var router = new Router();
	var appView = new AppExercise.View({ 'translations': translations, 'vocabulary': vocabulary, 'langs': langs, 'router': router });

    Backbone.history.start({});
    
});