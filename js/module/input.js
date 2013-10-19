define(['backbone', 'jquery', 'underscore', 'module/utilize', 'module/dimensions', 'text!template/input.html', 'module/dimensions', 'jquery-ui', 'tokeninput', 'fckeditor', 'uploadify'], 
	function(Backbone, $, _, Utilize, Dimensions, mixedTemplates){
	
	/*Template*/
	var Tpl = Utilize.Template( mixedTemplates );

	/* Declaration */
	var Input = { Views: {}, Plugins: {} };

	/* Model */
	Input.Model = Backbone.Model.extend({
		defaults: {
			name: '',
			namespace: '',
			label: '',
			description: '',
			tooltip: '',
			placeholder: '',
			error: '',
			type: 'text',
			options: [],
			value: 0,
			group: null,
			isRequired: 0
		},

		initialize: function(){
			this.set('id', this.get('namespace') + '-' + this.get('name'));
		}
	});

	/* Collection */
	Input.Collection = Backbone.Collection.extend({
		model: Input.Model
	});
	
	/* Views.Input */
	Input.Views.Input = Backbone.View.extend({

		tagName: 'div',

		className: 'input-container',

		initialize: function(options){

			this.template = _.template(Tpl[this.model.get('type')]);
			this.options = options.options;
			this.$el.addClass( 'input-container-' + this.model.get('name') );
		},

		render: function(){

			var data = {
				input: this.model.toJSON()
			};

			if(this.options) {
				data.options = this.options;
			}

			this.$el.html( this.template( data ) );

			return this;		
		}

	});

	/* Views.Form */
	Input.View = Backbone.View.extend({
		
		tagName: 'div',

		className: 'input-container',

		initialize: function(options) {

			this.options = options.options;
			this.plugins = [];
			this.collection = new Input.Collection();

			if(options.data) {
				
				this.schema = options.data.schema;
				this.groups = options.data.groups;
				options.action = (options.action) ? options.action : 'edit' ;

				_.forEach(this.schema, function(input){

					if( !(options.action === 'add' && input.name === 'id') ) {

						input.namespace = options.namespace;
						input.value = options.data.attributes[input.name] || '';
						this.collection.add( new Input.Model(input), {silent: true} );
					} 	
				}, this);
				
			}
			
			this.render();

			return this;
		},

		render: function() {

			if(this.groups) {

				
				var template = _.template(Tpl['tab']);
				var inputs = {};
				var inputByGroup = this.collection.groupBy(function(model){
					return model.get('group');
				});

				//console.log(inputByGroup);

				var tmp = $('<div></div>');
				_.each(this.groups, function(data, key){

					inputs[key] = '';
					if(!data.content) {

						_.each(inputByGroup[key], function(input){

							this.addPlugin( input );
							var content = this.addOneInTab(input); 
							tmp.html(content);
							inputs[key] += tmp.html();	
						}, this);
					} else {
						inputs[key] = $("#"+data.content).html();
					}
					
				}, this);

				this.$el.html( template({ 'groupTitles': this.groups, 'groupContent': inputs  }) );

				this.$el.removeClass('input-container').addClass('form-container');

			} else {

				this.collection.each( this.addOne, this );

			}
			
	        return this;	
		},

		addOne: function(input){
			this.addPlugin(input);
			this.$el.append( this.getInputView(input) );
		},

		addOneInTab: function(input){
			return this.getInputView(input);
		},

		getInputView: function(input) {

			var data = {
				model: input
			};

			if(this.options) {

				if(this.options[input.get('name')]) {
					data.options = this.options[input.get('name')];
				}
			} 

			var inputView = new Input.Views.Input(data).render().el;

			return inputView;
		},

		addPlugin: function(input){


			this.plugins.push(input.toJSON());
			/*this.plugins.push({ 
				'type': input.get('type'),
				'input': input.id 
			});
*/
		},

		triggerPlugins: function(){
			
			_.each(this.plugins, function(data, key){

				if( _.isFunction(Input.Plugins[data.type]) ){
					//alert(data.type);
					Input.Plugins[data.type](data);
				}
			});

		}

	});

	Input.Plugins.editor = function(input) {

		
		$('#'+input.id).on('click', function( event ){
			
			var this_ = $(this);
	
			if(this_.hasClass('small')){
				this_.fck({path: '../../../js/lib/fckeditor/', height:100, ToolbarSet: 'Basic', config: {'GoogleMaps_Key' : 'fghfghfghf'} }); 
			}else{
				this_.fck({path: '../../../js/lib/fckeditor/', height:Dimensions.detailsContent - 155, config: {'GoogleMaps_Key' : 'fghfghfgh'} }); 
			}

			//this_.off( event );

		});

	}

	Input.Plugins.tokeninput = function(input) {

		
		var selected = [];

		if(input.value){
			$.ajax({
			  	url: input.src,
			  	data: 'ids='+input.value,
			  	contentType: 'application/json',
			  	type: 'json',
			  	cache: false,
			  	method: 'GET',
			  	async: false
			}).done(function(res) {
			  	selected = JSON.parse(res);
			});
		}

		var data = {
			propertyToSearch: 'title',
			preventDuplicates: true,
			prePopulate: selected,
			tokenLimit: input.limit || null,
			tokenFormatter: function(item) { return '<li id="' + input.id + '-' + item.id + '"><p>' + item.title + '</p></li>' }
		};
		
		var $this = $('#'+input.id);

		$this.parent().find('.token-input-list').remove();
		$this.tokenInput(input.src, data);

		$(".token-input-list").sortable({ 
			items: "> li.token-input-token", 
			placeholder: "ui-state-highlight",
			forcePlaceholderSize: true,
			stop: function( event, ui ) {

				var selected =  $this.tokenInput("get") ;
				var sorted =  $(this).sortable( "toArray" ) ;
				var selected_assoc = [];
				_.each(selected, function(value, key){
					selected_assoc[value.id] = value.title;
				});
				
				$this.tokenInput("clear") ;
				_.each(sorted, function(id, key){
					
					id = id.replace(input.id + '-', '');
					var title = selected_assoc[id];
					if(title) {
						$this.tokenInput( "add", {id: id, title: title} );
					}
				});

			}
		});

	}

	Input.Plugins.upload = function(input) {

		
		var namespace = input.id.replace(input.name, '');
		var relative_id = $('#'+namespace+'id').val() || 0;
		input.location = (input.location) ? input.location : ''

		$('#'+input.id+'-container').html('');
		$('#'+input.id).uploadify({

			'width' : 18,
			'height' : 16,
			'buttonClass' : 'icon',
			'buttonImage' : '/taskmanager-jam/public/images/clip.png',
			'hideButton' : true,
    		'wmode' : 'transparent',
			'fileDesc' : true,
			'formData' : {
				'location': input.location,
				'table' : input.table,
				'relative_id' : relative_id
			},
			'removeCompleted' : true,
			'swf' : 'js/lib/jquery.uploadify/uploadify.swf',
			'uploader' : input.src,
			'onUploadSuccess' : function(file, data, response) {
	            //alert('The file ' + file.name + ' was successfully uploaded with a response of ' + response + ':' + data);
	            data = JSON.parse(data);
	            console.log(data);
	            console.log(data['file_name']);
	            var filePath = input.location + '/' + data.file_name;
	            $('#'+input.id+'-container').append('<li><a href="' + filePath + '" target="_blank">'+data.file_name+'</a><span class="date">'+Utilize.formatTime(data.date_id)+'</span><input type="hidden" name="' + input.name + '[]" value="'+ data.id +'" /><span class="clear"></span></li>');

        	}
		});
		
	}

	return Input;
});