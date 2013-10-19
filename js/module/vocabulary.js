define(['backbone', 'jquery', 'underscore', 'module/utilize', 'text!template/vocabulary.html', 'tags_input_master', 'serializeObject'], 
	function(Backbone, $, _, Utilize, mixedTemplates){

	/*
	Paginator
	'paginator', 
	*/

	/*Template*/
	var Template = Utilize.Template(mixedTemplates);
	
	/* Declaration */
	var Vocabulary = { Views: {} };

	/* Model */
	Vocabulary.Model = Backbone.Model.extend({
		urlRoot: '/vocabularies',
		defaults: {
			'labels': ''
		}
	});

	/* Collection */
	Vocabulary.Collection = Backbone.Collection.extend({
		url: '/vocabularies',
		model: Vocabulary.Model,
		search : function(letters){
			if(letters == "") return this;
	 
			var pattern = new RegExp(letters,"gi");
			return _(this.filter(function(data) {
				var res = ( 
					pattern.test(' ' + data.get("title") + ' *^&*&^') || 
					pattern.test(' ' + data.get("source") + ' *^&*&^') || 
					pattern.test(' ' + data.get("labels") + ' *^&*&^') 
				);
			  	return res;
			}));
		},
		sort_key: 'title', // default sort key
		sort_type: 'asc', // default sort key
	    comparator: function(item) {
	    	
	    	if(this.sort_type == 'asc'){
	        	return item.get(this.sort_key);
	        } else if(this.sort_type == 'desc') {
	        	var value = item.get(this.sort_key);
	        	if(_.isNumber(value)){
	        		return -item.get(this.sort_key);
	        	} else {
	        		var str = value.toLowerCase();
				  	str = str.split("");
				  	str = _.map(str, function(letter) { 
				    	return String.fromCharCode(-(letter.charCodeAt(0)));
				  	});
				  	return str;
	        	}
	        } else {
	        	return item.get(this.sort_key);
	        }
	        
	    },
	    sortByField: function(fieldName, type) {
	        this.sort_key = fieldName;
	        this.sort_type = type;
	        this.sort();

	        vent.trigger('vocabularies:sort');
	    }
	});

	/* Layout */
	Vocabulary.Views.Layout = Backbone.View.extend({

		el: $('#vocabularies'),

		events: {
			"keyup #search-input" : "search",
			"click .orderby" : "orderby"
		},

		initialize: function(options){

			vent.on('vocabularies:editVocabulary', this.edit, this);
			
			this.langs = options.langs;

			return this;
		},

		search: function(e){
			var query = $(e.currentTarget).val();
			vent.trigger('vocabularies:search', query);
		},

		edit: function(data) {

			var that = this,
				model = this.collection.get(data.id)
			;

			if(model){

				var editVocabulary = new Vocabulary.Views.EditVocabulary({ model: model, langs: that.langs }).render();
				$("#editvocabulary").html(editVocabulary.$el);

				$('#inputEditLabels').tagsInput({
	    			onAddTag: function() {
    					$(this).importTags($(this).val());
    				} 
		    	});
			}
		},

		orderby: function(e) {


			var $el = $(e.currentTarget),
				field = $el.data('field'),
				type = $el.data('sorttype'),
				that = this
			;
			
			that.collection.sortByField(field, type);
		}

	});

	/* infoColumn */
	Vocabulary.Views.infoColumn = Backbone.View.extend({

		initialize: function(options){

			var that = this;

			that.template = _.template(Template['vocabulary-info-right-column']);
			
			that.langs = options.langs;
			that.translation_length = options.translation_length;

			return this;
		},

		render: function(){

			var that = this;

			that.$el.html( this.template({ vocabulary: this.model.toJSON(), langs: this.langs, translation_length: that.translation_length }) );

			return that;
		}

	});

	/* AddVocabulary */
	Vocabulary.Views.AddVocabulary = Backbone.View.extend({

	    el: $('#addvocabulary'),

	    initialize: function(options){
	    	var that = this;

	    	that.collection = options.collection;
	    	that.langs = options.langs;
	    	that.defaulLang_id = options.defaulLang_id;

	    	$("#inputAddLabels").tagsInput();

	    	that.$("#inputAddTitle").val('');
		    that.$("#textAddSource").val('');
		    that.$("#inputAddSourceUrl").val('');
		    that.$("#selecAddLang1").val('');
		    that.$("#selectAddLang2").val(that.defaulLang_id);
		    that.$('#sourceTypeAdd-0').attr('checked', true);
		    that.$("#inputAddLabels").importTags('');
	    },

	    events: {
	        'submit form': 'submit'
	    },

	    submit: function(e){
	        e.preventDefault();
	        
	        var that = this;
	        var vocabularyData = $(e.currentTarget).serializeObject();

	        if(!vocabularyData.nosave) {
		        vocabularyData.newItem = 1;
		        var resp = that.collection.create(vocabularyData, { wait: true });
		    }

		    $('#addvocabulary').modal('hide');
		    
		    that.$("#inputAddTitle").val('');
		    that.$("#textAddSource").val('');
		    that.$("#inputAddSourceUrl").val('');
		    that.$("#selecAddLang1").val('');
		    that.$("#selectAddLang2").val(that.defaulLang_id);
		    that.$('#sourceTypeAdd-0').attr('checked', true);
		    that.$("#inputAddLabels").importTags('');
	    }

	});

	/* EditVocabulary */
	Vocabulary.Views.EditVocabulary = Backbone.View.extend({

	    tagName: 'form',
	    
	    initialize: function(options){

	    	var that = this;

	        this.template = _.template(Template['vocabulary-edit']);
	        this.langs = options.langs;

	        this.validationResult = this.$el.validate({

				ignore: ".ignore",
				rules: {
					title: "required",
		            lang_1_id: "required",
		            lang_2_id: "required",
		            source: "required"
				},
				messages: {
					title: "Please type vocabulary's title",
		            lang_1_id: "Please select your Study Language",
		            lang_2_id: "Please select your Native Language",
		            source: "Please type the vocabulary's source"
				}
			});

			that.$el.on('change', "input[name=type_id]", function(){
				that.infoSource($(this));
			});
	        
	    },

	    events: {
	        'submit': 'submit'
	    },

	    submit: function(e){
	        e.preventDefault();
	        var that = this;
	        var vocabularyData = $(e.currentTarget).serializeObject();

	        
	        if( !that.validationResult.errorList.length ) {
		        if(that.model.set(vocabularyData)){
		            
		            
					var previousAttributes = that.model.previousAttributes();

		            var resp = that.model.save(vocabularyData, {
		            	error: function(model, response){
						    that.model.set(previousAttributes);
						}, 
						success: function(){
							$('#editvocabulary').modal('hide');
						}
		            });

		        } else {
		            
		            
		        }
		    }
	    },

	    render: function(){

	    	var that = this;
	        var vocabulary = this.model.toJSON();

	        this.$el.html( this.template({ vocabulary: vocabulary, langs: that.langs }) );

	        var $radios = this.$("input[name=type_id]");
	        var $selectedRadio = $radios.filter('[value='+vocabulary.type_id+']');
		    //if($radios.is(':checked') === false) {
		    $selectedRadio.prop('checked', true);
		    //}

		    that.infoSource($selectedRadio);

		    that.$("#inputEditSourceUrl")
				.keyup(that.inputAddSourceUrl)
				.blur(that.inputAddSourceUrl)
				.focus(that.inputAddSourceUrl)
			;


	        return this;
	    },

	    infoSource: function (el){
			var that = this,
				this_ = el,
				val = this_.val(),
				info = this_.data('info')
			;

			if( val != '0' ) {
				
				that.$("#source_inputs").show();
				that.$("#textEditSource").attr('class', 'span12');
			} else {
				
				that.$("#source_inputs").hide();
				that.$("#textEditSource").attr('class', 'span12 ignore');
			}

			that.$("#selection-info")
				.html('<hr/>'+that.$("#selection-"+info).html())
				//.wrapInner('<div class="well well-small"/>')
			;
		},

		inputAddSourceUrl: function (e){
			var that = this;
			var	this_ = $("#inputEditSourceUrl"),
				val = this_.val().replace('http://', '')
			;
			this_.val(val);
			$("#editSourceUrl").html('<a href="http://'+val+'" target="_blank">'+val+'</a>');
		}
	});

	/* Vocabulary */
	Vocabulary.Views.Vocabulary = Backbone.View.extend({
	    tagName: 'div',
	    className: 'media',
	    initialize: function(options) {
	        
	        // set up template
	        this.template = _.template(Template['vocabulary-showInList']);
	        
	        // set up Vocabulary listeners
	        this.model.on({
	        	'remove': this.unrender,
	        	'destroy': this.unrender,
	        	'change': this.render
	        }, this);

	        //


	        this.langs = options.langs;
	        this.users = options.users;
	        
	    },

	    events: {
	        'click a.delete': 'deleteVocabulary',
	        'click a.edit': 'editVocabulary'
	    },

	    deleteVocabulary: function(e) {
	    	e.preventDefault();
	    	var that = this;
	    	Utilize.getConfirm("Are sure that you want to delete this vocabulary?", function(result){
	    			if(result) {
		    			
		        		that.model.destroy();
		        	}
	    	});

	    },

	    editVocabulary: function(e) {
	    	
	    	e.preventDefault();
	    	vent.trigger('vocabularies:editVocabulary', { id: this.model.id });
	    	
	    },

	    render: function() {
	        this.$el.attr('id', 'vocabulary-list-'+this.model.id);  

	        this.model.set('elapsedTime', Utilize.elapsedTime(this.model.get('date_in')) );

	        this.model.set('user', this.users.get(this.model.get('user_id')) );

	        this.$el.html( this.template({ vocabulary: this.model.toJSON(), langs: this.langs }) );
	        

	        return this;
	    },

	    unrender: function() {
	        this.remove();
	    }

	});
	
	/* Vocabularies */
	Vocabulary.Views.Vocabularies = Backbone.View.extend({

	    el: $('#vocabulary-list'),

	    initialize: function(options) {
	        
	    	// set up collection listener
	        this.collection.on({
	        	'reset': this.addAll,
	        	'add': this.addOne
	        }, this);

	        // set up vent listener
	        vent.on({
	        	'vocabularies:search': this.search,
	        	'vocabularies:sort': this.render
	        }, this);

	        

	        // declare viewCollection
	        this.viewCollection = this.collection;

	        //extend this from options
	        this.langs = options.langs;
	        this.users = options.users;

	        // render
	        this.render();

	        this.$el.find('._tooltip').tooltip({
	        	container: 'body'
	        });

 			return this;
	    },

	    render: function() {
	    	
	    	this.$el.html('');
	        this.collection.each( this.addOne, this );
	        return this;
	    },

	    search: function(query){
	    	this.$el.empty();
			this.viewCollection = this.collection.search(query);
			this.viewCollection.each( this.addOne, this );
		},

	    addAll: function(){
	        
            this.$el.html('');
            this.render();
	        return this;
	    },

	    addOne: function(vocabulary) {

	        var vocabularyView = new Vocabulary.Views.Vocabulary({ model: vocabulary, langs: this.langs, users: this.users });
	        var vocabularyViewEl = vocabularyView.render();
	        if(vocabulary.get('newItem')){
	            this.$el.prepend(vocabularyViewEl.el);
	        } else {
	            this.$el.append(vocabularyViewEl.el);
	        }

	        this.$('._tooltip').tooltip({
				container: 'body'
			});
	    }
	});


	/* Vocabulary */
	Vocabulary.Views.libraryVocabulary = Backbone.View.extend({
	    tagName: 'div',
	    className: 'media',
	    initialize: function(options) {
	        
	        // set up template
	        this.template = _.template(Template['vocabulary-library-showInList']);
	        
	        // set up Vocabulary listeners
	        this.model.on({
	        	'remove': this.unrender,
	        	'destroy': this.unrender,
	        	'change': this.render
	        }, this);

	        //

	        this.langs = options.langs;
	        this.users = options.users;
	        
	    },

	    events: {
	        'click a.remove': 'removeVocabulary'
	    },

	    removeVocabulary: function(e) {
	    	e.preventDefault();
	    	var that = this;
	    	Utilize.getConfirm("Are sure that you want to delete this vocabulary?", function(result){
	    			if(result) {
		    			
	    				var random = new Date();

		        		if(that.model.get('library_id')) {
			        		$.ajax({
								type: "DELETE",
								url: "/library/"+that.model.get('library_id'),
								data: "random="+random,			   
								dataType: "json",
								cache: false,
								success: function(res){
									//alert(res.success +' '+ $(location).attr('href'));
									if(res.success){
										that.unrender();
									}else{
										alert('Try again please! There was occurred an error.');
									}
								},
								error: function(XMLHttpRequest, textStatus, errorThrown){
									alert('Try again please! There was occurred an error.');
								}
							});
			        	} else {
			        		alert('Try again please! There was occurred an error.');
			        	}

		        	}
	    	});
	    },

	    render: function() {
	        this.$el.attr('id', 'vocabulary-list-'+this.model.id);  

	        this.model.set('elapsedTime', Utilize.elapsedTime(this.model.get('date_in')) );

	        this.model.set('user', this.users.get(this.model.get('user_id')) );

	        this.$el.html( this.template({ vocabulary: this.model.toJSON(), langs: this.langs }) );
	        

	        return this;
	    },

	    unrender: function() {
	        this.remove();
	    }

	});
	
	/* Vocabularies */
	Vocabulary.Views.libraryVocabularies = Backbone.View.extend({

	    el: $('#vocabulary-list'),

	    initialize: function(options) {
	        
	    	// set up collection listener
	        this.collection.on({
	        	'reset': this.addAll,
	        	'add': this.addOne
	        }, this);

	        // set up vent listener
	        vent.on({
	        	'vocabularies:search': this.search,
	        }, this);

	        // declare viewCollection
	        this.viewCollection = this.collection;

	        //extend this from options
	        this.langs = options.langs;
	        this.users = options.users;

	        if(this.collection.length>0) {
	        	this.$el.html('');
	        }

	        // render
	        this.render();

 			return this;
	    },

	    render: function() {
	        this.collection.each( this.addOne, this );
	        return this;
	    },

	    search: function(query){
	    	this.$el.empty();
			this.viewCollection = this.collection.search(query);
			this.viewCollection.each( this.addOne, this );
		},

	    addAll: function(){
	        
            this.$el.html('');
            this.render();
	        return this;
	    },

	    addOne: function(vocabulary) {

	        var vocabularyView = new Vocabulary.Views.libraryVocabulary({ model: vocabulary, langs: this.langs, users: this.users });
	        var vocabularyViewEl = vocabularyView.render();
	        if(vocabulary.get('newItem')){
	            this.$el.prepend(vocabularyViewEl.el);
	        } else {
	            this.$el.append(vocabularyViewEl.el);
	        }
	    }
	});

	/*Vocabulary.Views.PaginatedView = Backbone.View.extend({

	    events: {
	      'click a.servernext': 'nextResultPage',
	      'click a.serverprevious': 'previousResultPage',
	      'click a.orderUpdate': 'updateSortBy',
	      'click a.serverlast': 'gotoLast',
	      'click a.page': 'gotoPage',
	      'click a.serverfirst': 'gotoFirst',
	      'click a.serverpage': 'gotoPage',
	      'click .serverhowmany a': 'changeCount'

	    },

	    tagName: 'tfoot',

	    initialize: function () {

	    	this.template = _.template(Template['pagination']);
	      	this.collection.on('reset', this.render, this);
	      	this.collection.on('sync', this.render, this);
	      	
	    },

	    render: function () {

	    	var size = 0, key, obj = this.collection.at(0).toJSON();
		    for (key in obj) {
		        if (obj.hasOwnProperty(key)) size++;
		    }

		    var data = this.collection.info();
		    data.colspan = size;
			var html = this.template(data);
			this.$el.html(html);
			this.stopLoading();
			return this;
	    },

	    updateSortBy: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      var currentSort = $('#sortByField').val();
	      this.collection.updateOrder(currentSort);
	    },

	    nextResultPage: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      this.collection.requestNextPage();
	    },

	    previousResultPage: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      this.collection.requestPreviousPage();
	    },

	    gotoFirst: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      this.collection.goTo(this.collection.information.firstPage);
	    },

	    gotoLast: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      this.collection.goTo(this.collection.information.lastPage);
	    },

	    gotoPage: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      var page = $(e.target).text();
	      this.collection.goTo(page);
	    },

	    changeCount: function (e) {
	      e.preventDefault();
	      this.startLoading();
	      var per = $(e.target).text();
	      this.collection.howManyPer(per);
	    },

	    startLoading: function() {
	    	vent.trigger('datagrid:startloading');
	    },

	    stopLoading: function() {
	    	
	    	//$("#modules_list_loader").fadeOut(1000);
	    }

	});

	Vocabulary.Collection.PaginatedCollection = Backbone.Paginator.requestPager.extend({

			model: Vocabulary.Model,

			paginator_core: {
				type: 'GET',
				dataType: 'jsonp',
				url: '/vocabularies?'
			},
			
			paginator_ui: {
				firstPage: 1,
				currentPage: 1,
				perPage: 3,
				totalPages: 10
			},
			
			server_api: {
				'per_page': function() { return this.perPage },
				'page': function() { return this.currentPage }
			},

			parse: function (response) {
				this.totalRecords = response.meta.totalRecords;
				this.totalPages = response.meta.totalPages;
				
				
				return response.data;
			}

	});*/

	return Vocabulary;
});
