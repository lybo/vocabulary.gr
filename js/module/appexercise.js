define(
	['backbone', 'jquery', 'underscore', 'module/vocabulary', 'module/user', 'module/translation', 'module/lang', 'module/exercise', 'module/global', 'module/utilize', 'text!template/exercise.html', 'tags_input_master', 'bootstrap', 'modernizr'], 
	function(Backbone, $, _, Vocabulary, User, Translation, Lang, Exercise, Global, Utilize, mixedTemplates){

	var Template = Utilize.Template(mixedTemplates);

	var App = { View: {} };
	App.View = Backbone.View.extend({

		initialize: function(options){

			var that = this;

			Global.general();

			

			if( options ){

				$("#all-exercises").hide();
				$("#execise_loader").show();

				that.template = _.template(Template['exercise-recommendations']);
				that.langs = new Lang.Collection(options.langs);
				that.router = options.router;
				that.historyData = new Object();

				var langDirection = 2,
					page = 1,
					eachpage = 5
				;

				vent.on({ 
					'exercise:recommendations' : this.recommendations
				}, this);

				var vocabularyModel = new Vocabulary.Model(options.vocabulary);

				that.translations = new Translation.Collection(options.translations );

				that.vocLangs = {lang_1: {}, lang_2: {} };
				that.vocLangs.lang_1.id = vocabularyModel.get('lang_1_id');
				that.vocLangs.lang_1.title = that.langs.get(that.vocLangs.lang_1.id).get('title');
				that.vocLangs.lang_1.short_title = that.langs.get(that.vocLangs.lang_1.id).get('short_title');
				that.vocLangs.lang_2.id = vocabularyModel.get('lang_2_id');
			    that.vocLangs.lang_2.title = that.langs.get(that.vocLangs.lang_2.id).get('title');
			    that.vocLangs.lang_2.short_title = that.langs.get(that.vocLangs.lang_2.id).get('short_title');

				var exerciseLayout = new Exercise.Views.Layout({collection: that.translations, vocabulary: options.vocabulary, langs: that.langs, langDirection: langDirection });

				var exerciseControls = new Exercise.Views.Controls({collection: that.translations, vocabulary: options.vocabulary, langs: that.vocLangs, langDirection: langDirection, router: this.router }).render();

				
				$(".header2").html(that.vocLangs.lang_1.title);
				$('#exercise-slicer-eachpage').html(exerciseControls.el);
				//$('#exercise2-slicer-eachpage').html(exerciseControls2.el);

				
				

				var exerciseHeader = new Exercise.Views.Header({collection: that.translations, vocabulary: options.vocabulary, langs: that.vocLangs, page: page, eachpage: eachpage, router: this.router });

	        	var exercisesView  = new Exercise.Views.Exercises({collection: that.translations, langs: that.vocLangs, langDirection: langDirection, page: page, eachpage: eachpage, router: this.router});

	        	var exercises2View  = new Exercise.Views.Exercises2({collection: that.translations, langs: that.vocLangs, langDirection: langDirection, page: page, eachpage: eachpage, router: this.router});

	        	this.makeCSV();

	        	

	        	


	        	$("#speaker_player").jPlayer({
			        swfPath: "/js/lib/jplayer/",
			        supplied: "mp3",
			        wmode: "window",
			        errorAlerts:true
			    });


	        	$('#exercise-list-body').on('focus', '.tagsinput:not(:first) input', function (e) {

	        		var this_ = $(this),
	        			position = this_.position()
	        		;
	        		
	        		$('html, body').animate({ 
	        			scrollTop: (position.top - 300)+"px" 
	        		}, 500);
	        		//scrollTop();

	        	});

	        	$('#exercise-list-body, #exercise2-list-body').on('keydown', '.tagsinput input', function (e) {
			
					var this_ = $(this),
						tr = this_.parents('.rendered'),
						code = (e.keyCode ? e.keyCode : e.which);
					;

					if ( code == 40 ){ //down
						
						
						if(tr.next()){
						
							$('.tagsinput input' , tr.next() ).focus();
							
						}
						
					}
					
					if( code == 38 ){ //up
						
						if(tr.prev()){
						
							$('.tagsinput input' , tr.prev() ).focus();
							
						}
						
					}
				});

	        	var $window = $(window);

				// side bar
			    setTimeout(function () {
			      $('.sidebar-right .affix').affix({
			        offset: {
			          top: 379
			        , bottom: 270
			        }
			      })
			    }, 100);


			    $("#add-library").click(function(){

			    	var this_ = $(this);
			    	var vocabulary_id = this_.data('vocabularyid');
			    	var random = new Date();
				    $.ajax({
						type: "POST",
						url: "/library",
						data: "vocabulary_id="+vocabulary_id,			   
						dataType: "json",
						cache: false,
						success: function(res){
							//alert(res.success +' '+ $(location).attr('href'));
							if(res.success){
								
								$("#library-controls")
									.removeClass('exclude-library')
									.addClass('include-library')
								;

								$("#remove-library").data('libraryid', res.libraryId);
								
							}else{
								alert('Try again please! There was occurred an error.');
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown){
							alert('Try again please! There was occurred an error.');
						}
					});

				});

				$("#remove-library").click(function(){

			    	var this_ = $(this);
			    	var library_id = this_.data('libraryid');
			    	var random = new Date();
				    $.ajax({
						type: "DELETE",
						url: "/library/"+library_id,
						data: "random="+random,			   
						dataType: "json",
						cache: false,
						success: function(res){
							//alert(res.success +' '+ $(location).attr('href'));
							if(res.success){
								
								$("#library-controls")
									.removeClass('include-library')
									.addClass('exclude-library')
								;
								
							}else{
								alert('Try again please! There was occurred an error.');
							}
						},
						error: function(XMLHttpRequest, textStatus, errorThrown){
							alert('Try again please! There was occurred an error.');
						}
					});

				});

				var tooltipguide = [
						{el: '#vocabulary-navigation', title: 'Vocabulary Navigation', content: 'Here you can navigate through the vocabulary using the pagination and the each page control', placement: 'left'   },
						{el: '#exercise_tabs', title: 'Exersices', content: 'Here you can practice the spelling and the pronunciation. Combine both exercises to succeed high performance.', placement: 'top'   },
						{el: '#exercise-list-body', title: 'Visual exercise', content: 'Here is the visual exercise. Translate each row and validate to see the progress', placement: 'top'   },
						//{el: '#'+$("#exercise-list-body tr:first-child").attr('id'), title: 'First row', content: 'Here is the first row from the exrcise translate <strong>'+that.vocLangs.lang_2.title+'</strong> to <strong>'+that.vocLangs.lang_1.title+'</strong>', placement: 'top'   },
						{el: '#parent-answers', title: 'See the answers', content: 'Click here to see the answers. That helps you when you study the vocabulary first time', placement: 'top'   },
						{el: '#swap-languages', title: 'Swap the languages', content: 'Swap the languages in order to study the both sides', placement: 'top'   },
						{el: '#validation', title: 'Validation', content: 'Click here when you answer the fields and see the results', placement: 'top'   },
						{el: '#exercise-recommendations', title: 'Recommendations', content: 'Here the system helps you to navigate through the vocabulary based at the point of the vocabulary that you have already studied', placement: 'top'   }
					];


				//Utilize.tooltipguide(tooltipguide);

				$("#help-button").click(function(){
					Utilize.tooltipguide(tooltipguide);
				});
	        }
        	
        	return this;
		},

		recommendations: function (data) {

			var result_text = '';

			if( data.total_correct_answers !== null ) {


				/*$(window).off('scroll');
				var position = $("#exercise-slicer-eachpage").position();
	    		$('html, body').animate({ 
	    			scrollTop: (position.top - 100)+"px" 
	    		}, 0);*/

				var position = $("#exercise-recommendations").position();
				//alert(position.top);
	    		$('html, body').scrollTop(position.top - 100);
				
				var correct_precent = (data.total_correct_answers * 100)/data.words_length;
				var round_correct_precent = Math.round(correct_precent);
				correct_precent = correct_precent.toFixed(2);

				result_text = 'You just finished! Well done!';
				var alert_type = 'success';
				if( round_correct_precent < 80 ) {
					result_text = 'You just finished! You should review again the words';
					alert_type = 'info';
				} 

				if ( round_correct_precent < 60 ) {
					result_text = 'You just finished! You should review again the words';
					alert_type = 'block';
				} 

				if( round_correct_precent < 40 ) {
					result_text = 'You just finished! You should review again the words';
					alert_type = 'error';
				}

				if( round_correct_precent < 20 ) {
					result_text = 'You just finished! You should review again the words';
					alert_type = 'error';
				}

				$("#exercise-overall-scoring").html(
					'<div class="alert alert-' + alert_type + '" style="margin:10px 0 0 0;">'
					+ '<button type="button" class="close" data-dismiss="alert">&times;</button>'
					+'Correct answers<br/>' + data.total_correct_answers + ' out of ' + data.words_length
					+ '<div class="progress progress-striped" style="margin-bottom: 0;"><div class="bar" style="width: ' + round_correct_precent + '%;"></div></div>'
					+ correct_precent + '%' 
					+'</div>'
				);
				
			}

			

			if (typeof this.historyData[data.eachpage] !== 'undefined') {
				this.historyData[data.eachpage].push(parseInt(data.page));
			} else {
				this.historyData[data.eachpage] = new Array();
			}

			var steps = new Array(5, 10, 15, 20, 30);
			
			var num_words = data.eachpage * data.page;
			var prev_words_array = new Array();
			var next_words_array = new Array();
			var new_page, prev_num, next_page;
			steps.forEach( function(eachpage, key){
				
				new_page = num_words/eachpage;
				
				if ( new_page % 1 == 0 && eachpage > data.eachpage ) {
					
					prev_num = eachpage - data.eachpage;
					prev_words_array.push({
						eachpage: eachpage,
						new_page: new_page,
						prev_num: prev_num
					});

				}

				next_page = (eachpage + num_words) / eachpage;

				if ( next_page % 1 == 0 && (eachpage + num_words) <= this.translations.length ) {
					next_words_array.push({
						eachpage: eachpage,
						next_page: next_page
					});

				}

				
			});

			$("#exercise-recommendations").html( this.template({
				prev_words: prev_words_array,
				next_words: next_words_array,
				current_words_data: data,
				all_words: this.translations.length
			}) );

			

			
		},
		makeCSV: function() {
		    var csv = "";//this.vocLangs.lang_1.title+"\t"+this.vocLangs.lang_2.title+"\n"

		    this.translations.forEach(function(translation, key){

		    	csv += translation.get('word_1').replace('&#039;', "'")+"\t"+translation.get('word_2').replace('&#039;', "'")+"\n";
		       	//console.log(translation);
		    });

		    window.URL = window.URL || window.webkiURL;
		    var blob = new Blob([csv]);
		    var blobURL = window.URL.createObjectURL(blob);
		    $("#downloadLink").html("");
		    $("<a></a>").
		    attr("href", blobURL).
		    attr("download", "data.csv").
		    html("<span class=\"icon icon-download _tooltip\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Download the vocabulary as CSV, settings(separate: tab, charset: utf-8)\"></span>").
		    appendTo('#downloadLink');

		    $("#downloadLink ._tooltip").tooltip({
				container: 'body'
			});
		}

	});

	return App;
});