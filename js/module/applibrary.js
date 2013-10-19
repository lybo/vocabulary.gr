define(
	['backbone', 'jquery', 'underscore', 'module/vocabulary', 'module/user', 'module/lang', 'module/global' , 'tags_input_master', 'bootstrap'], 
	function(Backbone, $, _, Vocabulary, User, Lang, Global){

	var App = { View: {} };
	App.View = Backbone.View.extend({

		initialize: function(options){

			var that = this;

			Global.general();

			if( options && options.vocabularies.length>0){

				
				that.langs = new Lang.Collection(options.langs);

				that.users = new User.Collection(options.users);
				

				that.vocabularies = new Vocabulary.Collection(options.vocabularies);

				var vocabularyLayout = new Vocabulary.Views.Layout({collection: that.vocabularies, langs: that.langs });
	        	var vocabulariesView  = new Vocabulary.Views.libraryVocabularies({collection: that.vocabularies, users: that.users, langs: that.langs});
		        
	        }
        	
        	return this;
		}

	});

	return App;
});