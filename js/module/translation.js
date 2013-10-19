define(['backbone', 'jquery', 'underscore', 'module/utilize', 'text!template/translation.html', 'serializeObject'], 
	function(Backbone, $, _, Utilize, mixedTemplates){

	/*Template*/
	var Template = Utilize.Template(mixedTemplates);
	
	/* Declaration */
	var Translation = { Views: {} };

	/* Model */
	Translation.Model = Backbone.Model.extend({
		urlRoot: '/translations',
	});

	/* Collection */
	Translation.Collection = Backbone.Collection.extend({
		url: '/translations/topic',
		model: Translation.Model,
		search : function(letters){
			if(letters == "") return this;
	 
			var pattern = new RegExp(letters,"gi");
			return _(this.filter(function(data) {
				var res = ( pattern.test(' ' + data.get("word_1") + ' *^&*&^') || pattern.test(' ' + data.get("word_2") + ' *^&*&^') )
			  	return res;
			}));
		}
	});

	/* Layout */
	Translation.Views.Layout = Backbone.View.extend({

		el: $('#content'),

		events: {
			"keyup #search-input" : "search"
		},

		initialize: function(options){

			//this.addTranslationView  = new Translation.Views.AddTranslation({collection: this.collection });
			$('#content .translation').mouseover(this.triggerInputTags);
			$(window).scroll(this.triggerInputTags);

			return this;
		},

		search: function(e){
			var query = $(e.currentTarget).val();
			if( query.length >= 3  ){
				vent.trigger('translations:search', query);
			} else if(query.length == 2 || query.length == 0) {
				vent.trigger('translations:search', '');
			}
		},

		edit: function(data) {

			var model = this.collection.get(data.id);
			if(model){
				var editTranslation = new Translation.Views.EditTranslation({ model: model }).render();
			}
		},

		triggerInputTags: function() {
			vent.trigger('translation:triggerInputTags');
		}

	});

	/* AddTranslation */
	Translation.Views.AddTranslation = Backbone.View.extend({

	    el: $('#add-new-translation'),

	    initialize: function(){
	    	var that = this;

	    },

	    events: {
	        'submit': 'submit'
	    },

	    submit: function(e){
	      e.preventDefault();
	        
	      var that = this;
	      var translationData = $(e.currentTarget).serializeObject();

	      if(!translationData.nosave) {
	        translationData.newItem = 1;
	        var resp = that.collection.create(translationData, { wait: true });
		    }

		    that.$("input[name=word_1]").val('');
		    that.$("input[name=word_2]").val('');

		    $('#add-new-translation .tags').each(function(){
		    	$(this).importTags('');
		    });

	    }

	});

	/* Translation */
	Translation.Views.Translation = Backbone.View.extend({
	    tagName: 'tr',

	    initialize: function() {
	        
	        // set up template
	        this.template = _.template(Template['translation-showInList']);
	        
	        // set up Translation listeners
	        this.model.on({
	        	'remove': this.unrender,
	        	'destroy': this.unrender,
	        	'change': this.change
	        }, this);

	    },

	    events: {
	        'click a.delete': 'deleteTranslation',
			'focus  input' : 'showCurrent',
			'blur input' : 'hideCurrent',
	    },

	    showCurrent: function(e) {

			if(!this.$el.hasClass('focus')) {
				this.$el.find('.result').removeClass('hidden');
				this.$el.addClass('focus');
			}

		},

		hideCurrent: function(e) {

			if( !this.$el.find('.userAnswer').val() ) {
				this.$el.find('.result').addClass('hidden');
			}

			this.$el.removeClass('focus');

		},

	    deleteTranslation: function(e) {
	    	e.preventDefault();
	      var that = this;
	    	Utilize.getConfirm("Are sure that you want to delete this entry?", function(result){
	    			if(result) {
		        	that.model.destroy();
		        }
	    	});
	    },

	    render: function() {
	        this.$el.attr('id', 'translation-list-'+this.model.id);
	        this.$el.data('id', this.model.id);
	        this.$el.html( this.template( this.model.toJSON() ) );

	        return this;
	    },

	    unrender: function() {
	        this.remove();
	    },

	    change: function() {
	    	
	    }

	});

	/* Translations */
	Translation.Views.Translations = Backbone.View.extend({

	    el: $('#translation-list-body'),

	    initialize: function() {
	        
	    		// set up collection listener
	        this.collection.on({
	        	'reset': this.addAll,
	        	'add': this.addOne
	        }, this);

	        // set up vent listener
	        vent.on({
	        	'translations:search': this.search,
	        }, this);

	        vent.on({
	        	'translation:triggerInputTags': this.renderTagInputs
	        }, this);

	       

	        // declare viewCollection
	        this.viewCollection = this.collection;

	        // render
	        this.render();


	        this.renderTagInputs(10);
 					return this;
	    },

	    render: function() {
	    	
	    	if( this.collection.length ) {
	        	this.collection.each( this.addOne, this );

	        }
	        return this;
	    },

	    search: function(query){
	    	
		    this.$("tr").addClass('hidden');
				this.viewCollection = this.collection.search(query);
				this.viewCollection.each( function(translation) {
					this.$( "tr#translation-list-"+translation.get('id') ).removeClass('hidden');
				}, this );

			},

	    addAll: function(){
	        
        this.$el.html('');
        this.render();
        return this;
	    },

	    addOne: function(translation) {

	    	var that = this;
        var translationView = new Translation.Views.Translation({ model: translation });
        var translationViewEl = translationView.render();
        if(translation.get('newItem')){
            that.$el.prepend(translationViewEl.el);
            that.renderTagInput(translationViewEl.$el);
            translationViewEl.$el.addClass('rendered');
        } else {
            that.$el.append(translationViewEl.el);
        }

	    },

	    update: function(translation_id) {
	    	var that = this;
	    	var model = that.collection.get(translation_id);
	    	var tr = $('#translation-list-'+translation_id);
				if( model ) {
					var word_1 = $('.word_1', tr);
					var word_2 = $('.word_2', tr);
					word_1.importTags(word_1.val());
					word_2.importTags(word_2.val());
  				model.set({
  					word_1: $('.word_1', tr).val(),
  					word_2: $('.word_2', tr).val()
  				});
  				model.save();
				}

	    },

	    renderTagInputs: function(unit) {
	      if(typeof unit != 'number') { 
	        unit = 4;
	      }
	      var that = this;
	      var translations_rendered = $('.translation tr').not('.rendered, .hidden');
	      if( translations_rendered.length >= 0 ) {

	        translations_rendered.slice(0, unit).each(function(){

	        	that.renderTagInput($(this));
	        	//console.log('render');

	          $(this).addClass('rendered');
	        });
	      } else {
	        $('.translation').off('mouseover');
	        $('.translation').off('scroll');
	      }
	    },

	    renderTagInput: function(el) {
	    	var that = this;
	    	var translation_id = el.data('id');
	    	$('input[type=text]', el.not('.rendered, .hidden')).each(function(){
		    	$(this).tagsInput({
		    		onAddTag: function() {
	    				$(this).importTags($(this).val());
	    				that.update(translation_id);
	    			},
	    			onRemoveTag: function() {
	    				
	    				that.update(translation_id);
	    			},
	    			'defaultText':'add a word',  
		    	});
		    });
	    }
	});

	/* Translation */
	Translation.Views.Translation_confirm = Backbone.View.extend({
	    tagName: 'tr',

	    initialize: function() {
	        
	        // set up template
	        this.template = _.template(Template['translation-showInList_confirm']);
	        
	    },

	    render: function() {
	        this.$el.attr('id', 'translation-list2-'+this.model.id);
	        this.$el.data('id', this.model.id);
	        this.$el.html( this.template( this.model.toJSON() ) );

	        return this;
	    }	
	    

	});

	/* Translations */
	Translation.Views.Translations_confirm = Backbone.View.extend({
		tagName: 'table',
		className: 'table table-striped table-condensed',
	    render: function() {
	    	
	    	if( this.collection.length ) {
	        	this.collection.each( this.addOne, this );

	        }
	        return this;
	    },

	    
	    addAll: function(){
	        
	        this.$el.html('');
	        this.render();
	        return this;
	    },

	    addOne: function(translation) {

	    	var that = this;
	        var translationView = new Translation.Views.Translation_confirm({ model: translation });
	        var translationViewEl = translationView.render();
	        if(translation.get('newItem')){
	            that.$el.prepend(translationViewEl.el);
	            that.renderTagInput(translationViewEl.$el);
	            translationViewEl.$el.addClass('rendered');
	        } else {
	            that.$el.append(translationViewEl.el);
	        }

	    }

	});

	return Translation;
});
