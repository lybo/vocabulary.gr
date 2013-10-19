define(['backbone'], function(Backbone){

	var Router = {};

	Router = Backbone.Router.extend({

		initialize: function(options){

			for (param in options) {
			 	this[param] = options[param];
			}

		},

	    routes: {
	        "exercise/:eachpage/:page": "showExercise"
	    },

	    showExercise: function(eachpage, page){
	    	
	    	
	    	vent.trigger('exercise:navigation', { eachpage: eachpage, page: page });

	    }

	});

	return Router;
});