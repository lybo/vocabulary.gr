define(['backbone', 'jquery', 'underscore', 'module/utilize'], function(Backbone, $, _, Utilize){


	var User = {};

	User.Model = Backbone.Model.extend({


	});

	/* Collection */
	User.Collection = Backbone.Collection.extend({
		url: '/users',
		model: User.Model
	});

	return User;
});