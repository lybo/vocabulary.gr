define(
	['backbone', 'jquery', 'underscore', 'module/subscribe', 'module/user'], 
	function(Backbone, $, _, Subscribe, User){

	var App = { View: {} };
	App.View = Backbone.View.extend({

		initialize: function(options){

			var that = this;

			if(typeof window.is_logged !== 'undefined' && window.is_logged == 1){

				var subscribes = new Subscribe.Collection();
				var users = new User.Collection();
				users.url = '/users/subscribes';

				users.on('reset', function(collection, response, options){

					if(typeof window.listusers !== 'undefined'){
						var vocabularyUser =  new User.Model(window.listusers[0]);
					} else if( typeof window.vocabularyOwner !== 'undefined' ){
						var vocabularyUser =  new User.Model(window.vocabularyOwner);
					}

					if(typeof window.vocabularyOwner !== 'undefined' && window.vocabularyOwner.id) {
						window.user_id = window.vocabularyOwner.id;
					}
					if( typeof user_id !== 'undefined' && user_id )  {

						
						
						var addRemoveSubscribeView = new Subscribe.Views.AddRemoveSubscribe({ collection: subscribes, vocabularyUser: vocabularyUser, users: users });
					}

					if(typeof vocabularyUser !== 'undefined' ){
						users.add(vocabularyUser);
					}

					var subscribesView = new Subscribe.Views.Subscribes({ collection: subscribes, users: users });
				});

				subscribes.on('reset', function(collection, response, options){
					var subscribe_user_ids_array =  collection.pluck('subscribe_user_id');
					var subscribe_user_ids= subscribe_user_ids_array.join(',');
					var data = {user_ids: subscribe_user_ids};

					users.fetch({ data: data });
				});
				subscribes.fetch();

			}
        	
        	return that;
		}

	});

	return App;
});