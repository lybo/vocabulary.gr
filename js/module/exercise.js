define(['backbone', 'jquery', 'underscore', 'module/utilize', 'text!template/exercise.html', 'module/translation', 'serializeObject', 'jplayer', 'cookie'],
	function(Backbone, $, _, Utilize, mixedTemplates, Translation){

	/* Template */
	var Template = Utilize.Template(mixedTemplates);

	/* Declaration */
	var Exercise = { Views: {} };

	/* Controls */
	Exercise.Views.Controls = Backbone.View.extend({

		//el: $('#exercise-slicer-eachpage'),

		initialize: function(options){

			this.template = _.template(Template['exercise-controls']);

			this.router = options.router;
			this.langs = options.langs;
			this.collection_length = this.collection.length;
			this.eachpage = options.eachpage ? options.eachpage : 5;
			this.page = options.page ? options.page : 1;
			this.langDirection = options.langDirection ? options.langDirection : 2;

			vent.on({
				'exercise:updateLangDirection' : this.updateLangDirection
			}, this);

			vent.on({
				'exercise:navigation' : this.navigation
			}, this);

			return this;
		},

		events: {
			'click #exercise-slicer button' : 'selectEachPage'
		},

		navigation: function(data) {

			var that = this;

			that.eachpage = parseInt(data.eachpage);
			that.page = parseInt(data.page);

			$('button', that.$el).removeClass('active');
			$('button[data-value='+that.eachpage+']', that.$el).addClass('active');

			var exercisesView  = new Exercise.Views.Exercises({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});

			var exercisesView  = new Exercise.Views.Exercises2({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});

		},

		updateLangDirection: function(langDirection) {
			this.langDirection = langDirection;
		},

		selectEachPage: function (e){
			var that = this,
				el = e.currentTarget,
				eachpage = parseInt($(el).data('value'))
			;



			if( that.eachpage != eachpage && !$(el).hasClass('difficult_words') ) {

				that.eachpage = eachpage;
				that.page = 1;
				this.router.navigate('exercise/'+that.eachpage+'/'+that.page);

				var exercisesView  = new Exercise.Views.Exercises({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});

				var exercisesView  = new Exercise.Views.Exercises2({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});

			} else {
				//alert('This service is still in progress');

				that.eachpage = eachpage+1;
				that.page = 1;
				//this.router.navigate('exercise/'+that.eachpage+'/'+that.page);

				var stored_difficult_words = $.cookie('difficult_words') ? JSON.parse($.cookie('difficult_words')) : {};

				stored_difficult_words[vocabulary.id] = (typeof stored_difficult_words[vocabulary.id] === 'undefined') ? '' : stored_difficult_words[vocabulary.id];

				var difficult_words = stored_difficult_words[vocabulary.id].split(',');

				if(difficult_words.length) {

					//console.log(difficult_words);
					var partCollection = that.collection.filter(function(item){ return _.contains(difficult_words, item.id); });

					//console.log(JSON.stringify(partCollection));

					//this.partCollection = new Translation.Collection(_.shuffle(this.collection.slice(begin, end)));

					var exercisesView  = new Exercise.Views.Exercises({collection: partCollection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router, notEvaluateTheDifficultWords: 1});

					var exercisesView  = new Exercise.Views.Exercises2({collection: partCollection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router, notEvaluateTheDifficultWords: 1});

				}

				//
			}
		},

		render: function() {

			var each_page_options = new Array(5, 10, 15, 20 ,30);

			this.$el.html( this.template( {
				collection_length : this.collection_length,
				each_page_options : each_page_options,
				eachpage : this.eachpage ? this.eachpage : 5
			}));

			this.$('._tooltip').tooltip({
				container: 'body'
			});

			return this;
		}

	});

	/* Pagination */
	Exercise.Views.Pagination = Backbone.View.extend({

		//el: $('#exercise-slicer-pagination'),

		initialize: function(options){

			this.template = _.template(Template['exercise-pagination']);

			this.collection_length = this.collection.length;
			this.eachpage = options.eachpage;
			this.page = options.page ? options.page : 1 ;
			this.langDirection = options.langDirection;
			this.langs = options.langs;
			this.router = options.router;

			vent.on({
				'exercise:updateLangDirection' : this.updateLangDirection
			}, this);

			return this;
		},

		events: {
			'click button.page' : 'changePage',
			'click button.control' : 'changePageControl'
		},

		updateLangDirection: function(langDirection) {
			this.langDirection = langDirection;
		},

		changePage: function(e) {
			var that = this,
				el = e.currentTarget,
				page = parseInt($(el).text())
			;

			if( that.page != page ) {

				that.page = page;
				that.router.navigate('exercise/'+that.eachpage+'/'+that.page);

				var exercisesView  = new Exercise.Views.Exercises({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});

				var exercisesView  = new Exercise.Views.Exercises2({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});
			}
		},

		changePageControl: function(e) {
			var that = this,
				el = e.currentTarget,
				pagination_num = Math.round(this.collection_length/this.eachpage);
			;

			if($(el).hasClass('prev')) {
				that.page--;
			} else if($(el).hasClass('next')) {
				that.page++;
			}

			if(that.page<1) {
				that.page = 1;
			}

			if(that.page>pagination_num) {
				that.page = pagination_num;
			}

			that.router.navigate('exercise/'+that.eachpage+'/'+that.page);

			var exercisesView  = new Exercise.Views.Exercises({collection: that.collection, langs: that.langs, langDirection: that.langDirection, page: that.page, eachpage: that.eachpage, router: that.router});

		},

		render: function() {

			var pagination_num = Math.ceil(this.collection_length/this.eachpage);

			this.$el.html( this.template({
				pagination_num : pagination_num,
				currentPage : this.page
			}) );

			return this;
		}

	});

	/* Layout */
	Exercise.Views.Layout = Backbone.View.extend({

		el: $('#content'),

		initialize: function(options){

			$(window).scrollTop(0);

			vent.on({
				'exercise:updateLangDirection' : this.updateLangDirection
			}, this);

			this.langDirection = options.langDirection;

			return this;
		},

		updateLangDirection: function(langDirection) {
			this.langDirection = langDirection;
		}

	});

	/* Header */
	Exercise.Views.Header = Backbone.View.extend({

		el: $('#header-langs'),

		events: {
			"click #swap-languages" : "swapLanguages",
			"click .answers" : "showAnswers",
		},

		initialize: function(options){

			if( !this.currentLangDirection ) {
				this.currentLangDirection = 2;
			}

			this.router = options.router;
			this.langs = options.langs;
			this.vocabulary = options.vocabulary;
			this.page = options.page;
			this.eachpage = options.eachpage;

			this.lang_1 = this.langs.lang_1.title;
			this.lang_2 = this.langs.lang_2.title;;

			this.template = _.template(Template['exercise-'+this.currentLangDirection+'-header']);

			vent.on({
				'exercise:updateEachpage' : this.updateEachpage
			}, this);

			this.render();

			return this;
		},

		render: function() {
			var that = this;

			this.$el.html( this.template({
				lang_1_title: that.lang_1,
				lang_2_title: that.lang_2
			}) );
		},

		showAnswers: function(e) {
			//e.preventDefault();
			vent.trigger('exercise:validation', this.eachpage);
		},

		swapLanguages: function(e) {
			e.preventDefault();
			var that = this,
				exercisesView
			;

			if( this.currentLangDirection == 1 ) {
				this.currentLangDirection = 2;
			} else {
				this.currentLangDirection = 1;
			}

			this.template = _.template(Template['exercise-' + this.currentLangDirection + '-header']);
			this.render();
			exercisesView  = new Exercise.Views.Exercises({collection: that.collection, langs: that.langs, langDirection: this.currentLangDirection, page: 1, eachpage: this.eachpage, router: that.router });

			vent.trigger('exercise:updateLangDirection', this.currentLangDirection);

		},

		updateEachpage: function(eachpage) {
			this.eachpage = eachpage;
		}

	});

	/* Exercise */
	Exercise.Views.Exercise = Backbone.View.extend({
	    tagName: 'tr',

	    initialize: function(options) {
	        // set up template
	        this.template = _.template(Template['exercise-'+options.type+'-showInList']);

	        this.langDirection = options.type;
	        this.langs = options.langs;
	    },

	    events: {
	    	'change .userAnswer' : 'checkTheAnswer',
	    	'click .speaker' : 'speaker',
	    	'click .speaker2' : 'speaker2',
			'focus .tagsinput input' : 'showCurrent',
			'blur .tagsinput input' : 'hideCurrent',
	    },

	    showCurrent: function(e) {

			if(!this.$el.hasClass('focus')) {
				this.$el.find('.result').removeClass('hidden');
				this.$el.addClass('focus');
			}
		},

		hideCurrent: function(e) {

			var el = $(e.currentTarget);

			if( !this.$el.find('.userAnswer').val() ) {
				this.$el.find('.result').addClass('hidden');
			}

			this.$el.removeClass('focus');

		},

	    checkTheAnswer: function(e) {

	    	var that = this;
	    	var model = that.model;
	    	var type = (that.langDirection==1) ? 2 : 1;
	    	var answerEl =  that.$('.userAnswer');
	    	var answer_array = answerEl.val().split(',');
	    	var is_correct = true;

	    	_.each(answer_array, function(answer){
	    		console.log(answer);
	    		if( _.indexOf( model.get('word_'+type).toLowerCase().split(','), answer.toLowerCase() ) == -1 &&  answer != '' ) {
	    			is_correct = false;
	    		} else if( answer == '' ) {
	    			is_correct = 'no-answer';
	    		}


	    	});

	    	//alert(is_correct);
	    	if(is_correct == true) {
	    		that.$('.result').addClass('icon-thumbs-up');
	    		that.$('.result').removeClass('icon-thumbs-down');
	    		that.$('.result').removeClass('icon-hand-left');
	    		that.$('.result').removeClass('hidden');

	    		that.$('.answer').addClass('text-success');
	    		that.$('.answer').removeClass('text-error');

	    		that.$el.addClass('is_correct');
	    		that.$el.removeClass('is_not_correct');
	    	} else if(is_correct == false) {
	    		that.$('.result').addClass('icon-thumbs-down');
	    		that.$('.result').removeClass('icon-thumbs-up');
	    		that.$('.result').removeClass('icon-hand-left');
	    		that.$('.result').removeClass('hidden');

	    		that.$('.answer').addClass('text-error');
	    		that.$('.answer').removeClass('text-success');

	    		that.$el.addClass('is_not_correct');
	    		that.$el.removeClass('is_correct');
	    	} else if(is_correct == 'no-answer') {
	    		that.$('.result').removeClass('icon-thumbs-down');
	    		that.$('.result').removeClass('icon-thumbs-up');
	    		that.$('.result').addClass('icon-hand-left');
	    		that.$('.result').addClass('hidden');

	    		that.$('.answer').addClass('text-error');
	    		that.$('.answer').removeClass('text-success');

	    		that.$el.addClass('is_not_correct');
	    		that.$el.removeClass('is_correct');
	    	}

	    	console.log(that.langDirection);
	    	console.log(model.get('word_1')+', '+model.get('word_2') );

	    },

	    speaker2: function(e) {
	    	e.preventDefault();
	    	var that = this;
	    	var model = this.model;
	    	var word, short_lang, type = this.langDirection;
	    	if (this.langDirection == 2) {
	    		type = 1;
	    	}

	    	//console.log(that.langs);
	    	//console.log(type);


	    	word = that.model.get('word_'+type);
	    	short_lang = that.langs['lang_'+type].short_title.toLowerCase();


	    	//var source = 'http://translate.google.com/translate_tts?tl='+short_lang+'&q='+word;
	    	var source = 'http://vocabulary.gr/audio/'+short_lang+'/'+encodeURIComponent(word);

	    	$("#speaker_player").jPlayer("setMedia", {mp3: source, solution:"flash, html" }).jPlayer("play");




	    },

	    speaker: function(e) {
	    	e.preventDefault();
	    	var that = this;
	    	var model = this.model;
	    	var word, short_lang, type = 2;

	    	//alert('sfdfs');

	    	//console.log(that.langs);

	    	word = that.model.get('word_'+type);
	    	short_lang = that.langs['lang_'+type].short_title.toLowerCase();

	    	//var source = 'http://translate.google.com/translate_tts?tl='+short_lang+'&q='+word;
	    	var source = 'http://vocabulary.gr/audio/'+short_lang+'/'+encodeURIComponent(word);



		$("#speaker_player").jPlayer("setMedia", {mp3: source, solution:"flash, html" }).jPlayer("play");

	    	/*$("#speaker_phones").html(
					'<audio controls="controls" autoplay="autoplay">'+
					    '<source src="' + source + '" type="audio/mp3" />'+
					'</audio>'
			);

			audiojs.events.ready(function() {
			    var as = audiojs.createAll();
			});*/

	    },

	    showTheResults: function() {
	    	that.$('.answer').removeClass('hidden');
	    },

	    render: function() {
	        this.$el.attr('id', 'translation-list-'+this.model.id);
	        this.$el.data('id', this.model.id);
	        this.$el.html( this.template( this.model.toJSON() ) );

	        return this;
	    }

	});

	/* Exercises */
	Exercise.Views.Exercises = Backbone.View.extend({

	    el: $('#exercise-list'),

	    initialize: function(options) {

	    	var that = this;

	    	$("#all-exercises").hide();
			$("#execise_loader").show();

	    	this.$el.off('click', '#validation');
	    	this.$el.off('click', '#try_again');

			vent.on({
				'exercise:updateLangDirection' : this.updateLangDirection
			}, this);

			this.langDirection = options.langDirection;
			this.page = options.page;
			this.eachpage = options.eachpage;
			this.langs = options.langs;
			this.router = options.router;
			this.notEvaluateTheDifficultWords = options.notEvaluateTheDifficultWords ? 1 : 0;

			vent.trigger('exercise:updateEachpage', this.eachpage);

			vent.on({
				'exercise:validation' : this.validation
			}, this);


	        // render
	        this.render();

	        var exercisePagination = new Exercise.Views.Pagination({ collection: this.collection, langDirection: this.langDirection, langs: this.langs, page: this.page, eachpage: this.eachpage, router: this.router }).render();


	        $('#exercise-slicer-pagination').html(exercisePagination.el);
	        //$('').html(exercisePagination.el);


	        $('#exercise-list-body tr:first-child .result').removeClass('hidden');


 			return this;
	    },

	    events: {
			'click #validation' : 'validation',
			'click #try_again' : 'try_again'
		},

		try_again: function(e) {
			e.preventDefault();
			this.render();
		},

		validation: function(e){
			//e.preventDefault();

			var that = this;
			this.$el.removeClass('practice');
			this.$el.addClass('show-results');



			$("#header-langs .results").removeClass('hidden_results');

			var total_num_words = this.partCollection.length;
			var total_correct_answers = 0;


			if(!that.notEvaluateTheDifficultWords){
				var stored_difficult_words = $.cookie('difficult_words') ? JSON.parse($.cookie('difficult_words')) : {};
				stored_difficult_words[vocabulary.id] = (typeof stored_difficult_words[vocabulary.id] === 'undefined') ? '' : stored_difficult_words[vocabulary.id];
				var difficult_words = stored_difficult_words[vocabulary.id].split(',');
				var index;
			}

			this.partCollection.each( function(translation){
				var tr = $('#translation-list-'+translation.id);
				$('.answer', tr).removeClass('hidden');
				var userAnswer = $('.userAnswer', tr).val();
				//console.log('answer: '+userAnswer);
				userAnswer = userAnswer ? '<strong>'+userAnswer.replace(',', ',<br/>')+'</strong>' : '<em>No answer</em>'
				$('td.userInput', tr).html(userAnswer.replace(',', ',<br/>'));

				if(tr.hasClass('is_correct')) {
					total_correct_answers++;

					if(!that.notEvaluateTheDifficultWords){
						if(_.contains(difficult_words, translation.id) ) {
							index = difficult_words.indexOf(translation.id);
							difficult_words.splice(index, 1);
						}
					}
				} else  {

					if(!that.notEvaluateTheDifficultWords){
						if(!_.contains(difficult_words, translation.id)) {
							difficult_words.push(parseInt(translation.id));
						}
					}

				}

			}, this );

			if(!that.notEvaluateTheDifficultWords){
				stored_difficult_words[vocabulary.id] = _.compact(difficult_words).join(',');
				$.cookie('difficult_words', JSON.stringify(stored_difficult_words), { expires: 30*12 });
			}

			vent.trigger('exercise:recommendations', { 'eachpage': that.eachpage, 'page': that.page, 'words_length': total_num_words, 'total_correct_answers': total_correct_answers});


		},

		updateLangDirection: function(langDirection) {
			this.langDirection = langDirection;
		},

	    render: function() {

	    	var that = this;
	    	this.$("#exercise-list-body").html('');
	    	this.$el.addClass('practice');
			this.$el.removeClass('show-results');



	    	if( this.collection.length ) {



	    		var page = this.page;
	    		var eachpage = this.eachpage;

	    		var pageCal = page - 1;
	    		var begin = pageCal * eachpage;
	    		var end = begin + eachpage;
	    		this.partCollection = new Translation.Collection(_.shuffle(this.collection.slice(begin, end)));
	        	this.partCollection.each( this.addOne, this );
	        	this.renderTagInputs( eachpage );
	        	this.$('._tooltip').tooltip({
					container: 'body'
				});

	        	$('#exercise-list-body tr:first-child .tagsinput input').focus();

		        $("#exercise-overall-scoring").html('');

				vent.trigger('exercise:recommendations', {
					'eachpage': that.eachpage,
					'page': that.page,
					'words_length': that.partCollection.length,
					'total_correct_answers': null
				});
	        }
	        return this;
	    },



	    addOne: function(translation) {

	    	var that = this;
	        var translationView = new Exercise.Views.Exercise({ model: translation, langs: that.langs, type: this.langDirection });
	        var translationViewEl = translationView.render();
	        if(translation.get('newItem')){
	            that.$("#exercise-list-body").prepend(translationViewEl.el);
	            that.renderTagInput(translationViewEl.$el);
	            translationViewEl.$el.addClass('rendered');
	        } else {
	            that.$("#exercise-list-body").append(translationViewEl.el);
	        }

	    },

	    renderTagInputs: function(unit) {
			if(typeof unit != 'number') {
				unit = 2;
			}
			var that = this;
			var translations_rendered = $('#exercise-list-body tr').not('.rendered');



			if( translations_rendered.length > 0 ) {

				translations_rendered.slice(0, unit).each(function(){

					var el = $(this);
			    	var translation_id = el.data('id');
			    	$('input[type=text]', el.not('.rendered')).each(function(){
				    	$(this).tagsInput({
				    		onAddTag: function() {

			    				$(this).change()
			    			},
			    			onRemoveTag: function() {

			    				$(this).change();
			    			},
			    			'defaultText':'answer',
				    	});
				    });
				    el.addClass('rendered');

				});

				$("#all-exercises").show();
				$("#execise_loader").hide();

			} else {

				$('.translation').off('mouseover');
				$(window).off('scroll');
			}
	    }
	});

	/* Exercise */

	Exercise.Views.Exercise2 = Backbone.View.extend({
	    tagName: 'tr',

	    initialize: function(options) {
	        // set up template
	        this.template = _.template(Template['exercise2-showInList']);

	        this.langDirection = options.type;
	        this.langs = options.langs;
	    },

	    events: {
	    	'change .userAnswer' : 'checkTheAnswer',
	    	'click .speaker' : 'speaker',
			'focus .tagsinput input' : 'showCurrent',
			'blur .tagsinput input' : 'hideCurrent',
	    },

	    showCurrent: function(e) {

			if(!this.$el.hasClass('focus')) {
				this.$el.find('.result').removeClass('hidden');
				this.$el.addClass('focus');
			}
		},

		hideCurrent: function(e) {

			var el = $(e.currentTarget);

			if( !this.$el.find('.userAnswer').val() ) {
				this.$el.find('.result').addClass('hidden');
			}

			this.$el.removeClass('focus');

		},

	    checkTheAnswer: function(e) {

	    	var that = this;
	    	var model = that.model;
	    	var type = (that.langDirection==1) ? 2 : 1;
	    	var answerEl =  that.$('.userAnswer');
	    	var answer_array = answerEl.val().split(',');
	    	var is_correct = true;

	    	_.each(answer_array, function(answer){
	    		console.log(answer);
	    		if( _.indexOf( model.get('word_'+type).toLowerCase().split(','), answer.toLowerCase() ) == -1 &&  answer != '' ) {
	    			is_correct = false;
	    		} else if( answer == '' ) {
	    			is_correct = 'no-answer';
	    		}


	    	});

	    	//alert(is_correct);
	    	if(is_correct == true) {
	    		that.$('.result').addClass('icon-thumbs-up');
	    		that.$('.result').removeClass('icon-thumbs-down');
	    		that.$('.result').removeClass('icon-hand-left');
	    		that.$('.result').removeClass('hidden');

	    		that.$('.answer').addClass('text-success');
	    		that.$('.answer').removeClass('text-error');

	    		that.$el.addClass('is_correct');
	    		that.$el.removeClass('is_not_correct');
	    	} else if(is_correct == false) {
	    		that.$('.result').addClass('icon-thumbs-down');
	    		that.$('.result').removeClass('icon-thumbs-up');
	    		that.$('.result').removeClass('icon-hand-left');
	    		that.$('.result').removeClass('hidden');

	    		that.$('.answer').addClass('text-error');
	    		that.$('.answer').removeClass('text-success');

	    		that.$el.addClass('is_not_correct');
	    		that.$el.removeClass('is_correct');
	    	} else if(is_correct == 'no-answer') {
	    		that.$('.result').removeClass('icon-thumbs-down');
	    		that.$('.result').removeClass('icon-thumbs-up');
	    		that.$('.result').addClass('icon-hand-left');
	    		that.$('.result').addClass('hidden');

	    		that.$('.answer').addClass('text-error');
	    		that.$('.answer').removeClass('text-success');

	    		that.$el.addClass('is_not_correct');
	    		that.$el.removeClass('is_correct');
	    	}

	    	console.log(that.langDirection);
	    	console.log(model.get('word_1')+', '+model.get('word_2') );

	    },

	    speaker: function(e) {
	    	e.preventDefault();
	    	var that = this;
	    	var model = this.model;
	    	var word, short_lang, type = 1;

	    	word = that.model.get('word_1');
	    	short_lang = that.langs['lang_1'].short_title.toLowerCase();
	    	var source = 'http://vocabulary.gr/audio/'+short_lang+'/'+word;
		    $("#speaker_player").jPlayer("setMedia", {mp3: source, solution:"flash, html" }).jPlayer("play");

	    },

	    showTheResults: function() {
	    	that.$('.answer').removeClass('hidden');
	    },

	    render: function() {
	        this.$el.attr('id', 'translation-list2-'+this.model.id);
	        this.$el.data('id', this.model.id);
	        this.$el.html( this.template( this.model.toJSON() ) );

	        return this;
	    }

	});

	/* Exercises */
	Exercise.Views.Exercises2 = Backbone.View.extend({

	    el: $('#exercise2-list'),

	    initialize: function(options) {

	    	var that = this;

	    	this.$el.off('click', '#validation2');
	    	this.$el.off('click', '#try_again2');

			this.langDirection = options.langDirection;
			this.page = options.page;
			this.eachpage = options.eachpage;
			this.langs = options.langs;
			this.router = options.router;

			vent.on({
				'exercise:updateLangDirection' : this.updateLangDirection,
				'exercise:validation' : this.validation
			}, this);


			var exercisePagination = new Exercise.Views.Pagination({ collection: this.collection, langDirection: this.langDirection, langs: this.langs, page: this.page, eachpage: this.eachpage, router: this.router }).render();


	        $('#exercise-slicer-pagination').html(exercisePagination.el);


	        // render
	        this.render();

 			return this;
	    },

	    events: {
			'click #validation2' : 'validation',
			'click #try_again2' : 'try_again'
		},

		try_again: function(e) {
			e.preventDefault();
			this.render();
		},

		validation: function(e){
			//e.preventDefault();

			var that = this;
			this.$el.removeClass('practice');
			this.$el.addClass('show-results');

			var total_correct_answers = 0;

			this.partCollection.each( function(translation){
				var tr = $('#translation-list2-'+translation.id);
				$('.answer', tr).removeClass('hidden');
				var userAnswer = $('.userAnswer', tr).val();
				//console.log('answer: '+userAnswer);
				userAnswer = userAnswer ? '<strong>'+userAnswer.replace(',', ',<br/>')+'</strong>' : '<em>No answer</em>'
				$('td.userInput', tr).html(userAnswer.replace(',', ',<br/>'));

				if(tr.hasClass('is_correct')) {
					total_correct_answers++;
				}

			}, this );



			vent.trigger('exercise:recommendations', {
				'eachpage': that.eachpage,
				'page': that.page,
				'words_length': that.partCollection.length,
				'total_correct_answers': total_correct_answers
			});


		},

	    render: function() {

	    	var that = this;
	    	this.$("#exercise2-list-body").html('');
	    	this.$el.addClass('practice');
			this.$el.removeClass('show-results');



	    	if( this.collection.length ) {

	    		var page = this.page;
	    		var eachpage = this.eachpage;

	    		var pageCal = page - 1;
	    		var begin = pageCal * eachpage;
	    		var end = begin + eachpage;
	    		this.partCollection = new Translation.Collection(_.shuffle(this.collection.slice(begin, end)));
	        	this.partCollection.each( this.addOne, this );
	        	this.renderTagInputs( eachpage );


	        	$('#exercise2-list-body tr:first-child .tagsinput input').focus();

		        $("#exercise2-overall-scoring").html('');

		        this.$('._tooltip').tooltip({
					container: 'body'
				});

				/*vent.trigger('exercise:recommendations', {
					'eachpage': that.eachpage,
					'page': that.page,
					'words_length': that.partCollection.length,
					'total_correct_answers': null
				});*/

	    		/*var stored_difficult_words = $.cookie('difficult_words') ? JSON.parse($.cookie('difficult_words')) : {};

				stored_difficult_words[vocabulary.id] = (typeof stored_difficult_words[vocabulary.id] === 'undefined') ? '' : stored_difficult_words[vocabulary.id];

				var difficult_words = stored_difficult_words[vocabulary.id].split(',');

				if(difficult_words.length) {

					console.log('difficult_words');
					console.log(difficult_words);
					this.partCollection = new Translation.Collection(that.collection.filter(function(item){ return _.contains(difficult_words, item.id); }));
					this.partCollection = new Translation.Collection(this.partCollection.shuffle());
					console.log(this.partCollection);
					//alert('aaa');
				} else {
					this.partCollection = new Translation.Collection(this.collection.shuffle().slice(1, 10));
				}

				if( !this.partCollection.length ) {
					this.partCollection = new Translation.Collection(this.collection.shuffle().slice(1, 10));
				}*/



	    		//

	    		//_.shuffle(this.collection.slice(begin, end))

	    		//_.slice(this.collection.shuffle(), 0, 10)




	        }
	        return this;
	    },



	    addOne: function(translation) {

	    	var that = this;
	        var translationView = new Exercise.Views.Exercise2({ model: translation, langs: that.langs, type: this.langDirection });
	        var translationViewEl = translationView.render();
	        if(translation.get('newItem')){
	            that.$("#exercise2-list-body").prepend(translationViewEl.el);
	            that.renderTagInput(translationViewEl.$el);
	            translationViewEl.$el.addClass('rendered');
	        } else {
	            that.$("#exercise2-list-body").append(translationViewEl.el);
	        }

	    },

	    renderTagInputs: function(unit) {
			if(typeof unit != 'number') {
				unit = 2;
			}
			var that = this;
			var translations_rendered = $('#exercise2-list-body tr').not('.rendered');

			if( translations_rendered.length > 0 ) {

				translations_rendered.slice(0, unit).each(function(){

					var el = $(this);
			    	var translation_id = el.data('id');
			    	$('input[type=text]', el.not('.rendered')).each(function(){
				    	$(this).tagsInput({
				    		onAddTag: function() {

			    				$(this).change()
			    			},
			    			onRemoveTag: function() {

			    				$(this).change();
			    			},
			    			'defaultText':'answer',
				    	});
				    });
				    el.addClass('rendered');

				});

			} else {
				console.log('stop');
				$('.translation').off('mouseover');
				$(window).off('scroll');
			}
	    }
	});






	return Exercise;
});
