define(
	['backbone', 'jquery', 'underscore', 'module/vocabulary', 'module/user', 'module/lang', 'module/global' , 'tags_input_master', 'bootstrap'], 
	function(Backbone, $, _, Vocabulary, User, Lang, Global){

	var App = { View: {} };
	App.View = Backbone.View.extend({

		initialize: function(options){

			var that = this;

			Global.general();

			if( options ){

				that.langs = new Lang.Collection(options.langs);

				that.users = new User.Collection(options.users);

				
				that.vocabularies = new Vocabulary.Collection(options.vocabularies);
				

				

				var defaulLang_id = currentUser.lang_id;

				var vocabularyLayout = new Vocabulary.Views.Layout({collection: that.vocabularies, langs: that.langs });
	        	var vocabulariesView  = new Vocabulary.Views.Vocabularies({collection: that.vocabularies, users: that.users, langs: that.langs});
	        	var addVocabularyView  = new Vocabulary.Views.AddVocabulary({collection: this.vocabularies, langs: that.langs, defaulLang_id: defaulLang_id });

	        	
 
	        }
        	
        	return this;
		}
		
		

	});

	return App;
});