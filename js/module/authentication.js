define(['backbone', 'jquery', 'underscore', 'module/utilize', 'text!template/authentication.html', 'cookie'], function(Backbone, $, _, Utilize, mixedTemplates){

	/*Template*/
	var Template = Utilize.Template(mixedTemplates);
	
	/* Declaration */
	var USER = { Views:{} };

	/* Model */
	USER.Model = Backbone.Model.extend({
		urlRoot: '/users',
	});

	/* Collection */
	USER.Collection = Backbone.Collection.extend({
		url: '/users',
	});

	/* Views.Settings */
	USER.Views.Settings = Backbone.View.extend({
		
		tagname: 'div',
		id: 'login-settings',

		initialize: function() {
			var that = this;
			that.template = _.template(Template['settings']);
		},

		render: function() {
			var that = this;
			that.$el.html( that.template(that.model.toJSON()) );

			return this;
		}

	});

	/* Declaration */
	var USERROLE = {};

	/* Model */
	USERROLE.Model = Backbone.Model.extend({
		urlRoot: '/user_roles',
	});

	/* Collection */
	USERROLE.Collection = Backbone.Collection.extend({
		url: '/user_roles',
	});

	var AUTHENTICATION = {};

	/* View */
	AUTHENTICATION.LogIn = Backbone.View.extend({

		tagname: 'div',

		id: 'login-container',

		events: {
	        'submit form': 'submit'
	    },

		initialize: function(options) {

			var that = this;
			that.template = _.template(Template['login']);
		},

		render: function() {

			var that = this;
			that.$el.html( that.template() );

			return this;
		},

		submit: function(e){
	        e.preventDefault();

	        var that = this;
	        var loginData = $(e.currentTarget).serialize();
		    
		   	Utilize.sendData({
		   		url: '/login',
				data: loginData,
				type: 'GET',
				callback: function(res){

					if(res.id){
						window.location.href = '/taskmanager-jam/public/index.php';
					} else {
						$("#login-error").fadeIn(function(){
							$("#login-error").fadeOut(3000);
						}, 1000)
					}

				}
		   	}); 
			


	    }

	});

	return {
		"user": USER,
		"userRole": USERROLE,
		"authentication": AUTHENTICATION
	};
});