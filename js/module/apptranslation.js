define(
	['backbone', 'jquery', 'underscore', 'module/vocabulary', 'module/user', 'module/translation', 'module/lang', 'module/global', 'tags_input_master', 'bootstrap', 'form'], 
	function(Backbone, $, _, Vocabulary, User, Translation, Lang, Global){

	var App = { View: {} };
	App.View = Backbone.View.extend({

		initialize: function(options){

			var that = this;

			Global.general();

			if( options ){

				that.langs = new Lang.Collection(options.langs);

				that.translations = new Translation.Collection(options.translations );

				

				var translationLayout = new Translation.Views.Layout({collection: that.translations, vocabulary: options.vocabulary, langs: that.langs });
	        	var translationsView  = new Translation.Views.Translations({collection: that.translations, langs: that.langs});
	        	var addTranslationView  = new Translation.Views.AddTranslation({collection: this.translations, langs: that.langs });
	        	

	        	var vocabularyModel = new Vocabulary.Model(options.vocabulary);
	        	var editVocabulary = new Vocabulary.Views.EditVocabulary({ model: vocabularyModel, langs: that.langs }).render();
	        	var infoVocabulary = new Vocabulary.Views.infoColumn({ model: vocabularyModel, langs: that.langs, translation_length: that.translations.length }).render();
	        	$("#vocabulary_info_column").html(infoVocabulary.el);



	        	$("#lang_1_expample").html(that.langs.get(vocabularyModel.get('lang_1_id')).get('title'));
	        	$("#lang_2_expample").html(that.langs.get(vocabularyModel.get('lang_2_id')).get('title'));

				$("#editvocabulary").html(editVocabulary.$el);
				$('#inputEditLabels').tagsInput({
	    			onAddTag: function() {
    					$(this).importTags($(this).val());
    				} 
		    	});

				
				vocabularyModel.on('change', function() {
				  $('#vocabularyTitle').text(vocabularyModel.get('title'));
				  
				  $('#vocabularySource').text(vocabularyModel.get('source'));
				  //this.template = _.template(Template['vocabulary-info-right-column']);
				  //vocabulary-info-right-column
				  var infoVocabulary = new Vocabulary.Views.infoColumn({ model: vocabularyModel, langs: that.langs, translation_length: that.translations.length }).render();

				  $("#vocabulary_info_column").html(infoVocabulary.el);
				  
				});

				that.translations.on('add', function(m) {
					//var that = this;
					//alert(that.translations.length);
				  	var infoVocabulary = new Vocabulary.Views.infoColumn({ model: vocabularyModel, langs: that.langs, translation_length: that.translations.length }).render();

				  	$("#vocabulary_info_column").html(infoVocabulary.el);
				});

				that.translations.on('remove', function(m) {
				  	//var that = this;
				  	//alert(that.translations.length);
				  	var infoVocabulary = new Vocabulary.Views.infoColumn({ model: vocabularyModel, langs: that.langs, translation_length: that.translations.length }).render();

				  	$("#vocabulary_info_column").html(infoVocabulary.el);
				});

				$("#is_publish, #isnot_publish").click(function(){

			    	var this_ = $(this);
			    	var vocabulary_id = vocabulary.id;
			    	var random = new Date();

			    	if(vocabulary_id){
					    $.ajax({
							type: "POST",
							url: "/vocabularies/update_status/"+vocabulary_id,
							data: "random="+random,			   
							dataType: "json",
							cache: false,
							success: function(res){
								//alert(res.success +' '+ $(location).attr('href'));
								if(!res.is_published){
									$("#vocabulary_status").addClass('is_publish');
								}else{
									$("#vocabulary_status").removeClass('is_publish');
								}
							},
							error: function(XMLHttpRequest, textStatus, errorThrown){
								alert('Try again please! There was occurred an error.');
							}
						});
					}

					return false;

				});

				var bar = $('.bar');
				var percent = $('.percent');
				var image_dimensions = {};

				$('#import_form').ajaxForm({
				    beforeSend: function() {
				        
				        var percentVal = '0%';
				        bar.width(percentVal)
				        percent.html(percentVal);
				    },
				    uploadProgress: function(event, position, total, percentComplete) {
				        var percentVal = percentComplete + '%';
				        bar.width(percentVal)
				        percent.html(percentVal);
				    },
				    success: function() {
				        var percentVal = '100%';
				        bar.width(percentVal)
				        percent.html(percentVal);
				    },
					complete: function(xhr) {
						

						//console.log(xhr.responseText);
						var obj = {};
						if(_.isObject(eval("(" + xhr.responseText + ')'))){
							obj = eval("(" + xhr.responseText + ')');



							var translations = new Translation.Collection(obj );

							var translations_html = new Translation.Views.Translations_confirm({collection: translations}).render().el;

							$("#confirm_display").html(translations_html);
							$("#confirm_csv").modal('show');
							$("#import").modal('hide');
						} else {
							console.log( xhr.responseText );
						}
						
						

						

						/*
						if(typeof obj.success !== 'undefined') {
							
							alert('');

						} else if(typeof obj.error !== 'undefined') {
							alert(obj.error);
						} else {
							alert(xhr.responseText);
						}*/
					}
				});
 
	        }
        	
        	return this;
		}

	});

	return App;
});