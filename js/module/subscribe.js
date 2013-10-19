define(['backbone', 'jquery', 'underscore', 'module/utilize', 'text!template/subscribe.html', 'tags_input_master', 'serializeObject'], 
	function(Backbone, $, _, Utilize, mixedTemplates){

	/*Template*/
	var Template = Utilize.Template(mixedTemplates);
	
	/* Declaration */
	var Subscribe = { Views: {} };

	/* Model */
	Subscribe.Model = Backbone.Model.extend({
		urlRoot: '/subscribes'
	});

	/* Collection */
	Subscribe.Collection = Backbone.Collection.extend({
		url: '/subscribes',
		model: Subscribe.Model
	});

	/* AddRemoveSubscribe */
	Subscribe.Views.AddRemoveSubscribe = Backbone.View.extend({
		el: $('#subscribe-controls'),

	    initialize: function(options){
	    	var that = this;

	    	that.collection = options.collection;
	    	this.users = options.users;
	    	this.vocabularyUser = options.vocabularyUser;

	    	that.collection.on({
			  "add": that.addToCollection,
			  "destroy": that.removeFromCollection
			}, this);

	    	this.$el.html('');

    		var addSubscribe = new Subscribe.Views.AddSubscribe({ collection: that.collection, user: this.vocabularyUser });
			this.$el.append( addSubscribe.render().el );		

    		var deleteSubscribe = new Subscribe.Views.DeleteSubscribe({ collection: that.collection, user: this.vocabularyUser });
    		this.$el.append( deleteSubscribe.render().el );	

    		this.$el.find('._tooltip').tooltip({
				container: 'body'
			});

    		if( !this.users.get(this.vocabularyUser.id) ) {
    			$("#subscribe-controls").addClass('subscribe');
				$("#subscribe-controls").removeClass('unsubscribe');
    		} else {
    			$("#subscribe-controls").removeClass('subscribe');
				$("#subscribe-controls").addClass('unsubscribe');
    		}
	    	
	    },

	    addToCollection: function() {

	    	
	    	var num = parseInt( this.vocabularyUser.get('num_subscribes') ) + 1;
	    	this.vocabularyUser.set('num_subscribes', num);
	    	$("#user_num_subscribes").text(num);
	    	$("#subscribe-controls").removeClass('subscribe');
			$("#subscribe-controls").addClass('unsubscribe');
			
	    },

	    removeFromCollection: function() {
	    	
	    	
	    	var num = parseInt( this.vocabularyUser.get('num_subscribes') ) - 1;
	    	
	    	if(num < 0) {
	    		num = 0;
	    	}
	    	this.vocabularyUser.set('num_subscribes', num);
	    	$("#user_num_subscribes").text(num);
	    	$("#subscribe-controls").addClass('subscribe');
			$("#subscribe-controls").removeClass('unsubscribe');
			
	    }


	});

	/* AddSubscribe */
	Subscribe.Views.AddSubscribe = Backbone.View.extend({

	    initialize: function(options){
	    	var that = this;

	    	this.template = _.template(Template['subscribe-addButton']);

	    	that.collection = options.collection;
	    	//this.users = options.users;
	    	this.user = options.user;
	    },

	    events: {
	        'click button': 'submit'
	    },

	    submit: function(e){
	        e.preventDefault();
	        
	        var that = this
	        	, button = $(e.currentTarget)
	        	, subscribe_user_id = this.user.id;
	        ;
	        //alert(subscribe_user_id+', '+e.currentTarget.id);
	        if(subscribe_user_id) {
		        //var resp = that.collection.add({subscribe_user_id : subscribe_user_id, newItem : 1}, { wait: true });
		        var resp = that.collection.create({subscribe_user_id : subscribe_user_id, newItem : 1}, { wait: true });
		        
		    }

	    },

	    render: function() {
	    	this.$el.html( this.template({ user: this.user.toJSON() }) );
	    	
	    	return this;
	    }

	});

	/* DeleteSubscribe */
	Subscribe.Views.DeleteSubscribe = Backbone.View.extend({

	    

	    initialize: function(options){
	    	var that = this;

	    	this.template = _.template(Template['subscribe-removeButton']);

	    	that.collection = options.collection;
	    	//this.users = options.users;
	    	this.user = options.user;
	    },

	    events: {
	        'click button': 'submit'
	    },

	    submit: function(e){
	        e.preventDefault();
	        
	        var that = this
	        	, button = $(e.currentTarget)
	        	, subscribe_user_id = button.data('userid');
	        ;
	        //alert(subscribe_user_id+', '+e.currentTarget.id);
	        if(subscribe_user_id) {

	        	
	        	//var selected_subscribe = that.collection.where({subscribe_user_id: user_id});
	        	var selected_subscribe = null;
	        	that.collection.forEach(function(subscribe){

	        		//console.log(subscribe);
	        		//console.log(subscribe.subscribe_user_id +' == '+ user_id);
	        		if(subscribe.get('subscribe_user_id') == user_id){
	        			selected_subscribe = subscribe;
	        		}
	        	});


	        	

	        	if( selected_subscribe ){
		        	selected_subscribe.destroy();
				}
		    }

	    },

	    render: function() {
	    	this.$el.html( this.template({ user: this.user.toJSON() }) );
	    	
	    	return this;
	    }

	});

	/* Subscribe */
	Subscribe.Views.Subscribe = Backbone.View.extend({
	    tagName: 'li',
	    className: '',
	    initialize: function(options) {
	        
	        // set up template
	        this.template = _.template(Template['subscribe-showInList']);
	        
	        // set up Subscribe listeners
	        this.model.on({
	        	'remove': this.unrender,
	        	'destroy': this.unrender,
	        	'change': this.render
	        }, this);

	        //
	        this.users = options.users;
	        
	    },

	    events: {
	        'click a.delete': 'deleteSubscribe',
	        'click a.edit': 'editSubscribe'
	    },

	    deleteSubscribe: function(e) {
	    	e.preventDefault();
	    	var that = this;
	    	Utilize.getConfirm("Are sure that you want to delete this subscribe?", function(result){
	    			if(result) {
		    			
		        		that.model.destroy();
		        	}
	    	});

	    },

	    editSubscribe: function(e) {
	    	
	    	e.preventDefault();
	    	vent.trigger('subscribes:editSubscribe', { id: this.model.id });
	    	
	    },

	    render: function() {
	    	//console.log(this.model.toJSON());
	    	//console.log(this.users);
	        this.$el.attr('id', 'subscribe-list-'+this.model.id);
	        this.$el.html( this.template({ subscribe: this.model.toJSON(), users: this.users }) );
	        
	        return this;
	    },

	    unrender: function() {
	        this.remove();
	    }

	});
	
	/* Subscribes */
	Subscribe.Views.Subscribes = Backbone.View.extend({

	    el: $('#subscribes-list'),

	    initialize: function(options) {
	        
	    	// set up collection listener
	        this.collection.on({
	        	'add': this.addOne
	        }, this);

	        // declare viewCollection
	        this.viewCollection = this.collection;

	        //extend this from options
	        this.users = options.users;

	        // render
	        this.render();

 			return this;
	    },

	    render: function() {
	    	this.$el.html('');
	        this.collection.each( this.addOne, this );
	        return this;
	    },

	    addOne: function(subscribe) {

	        var subscribeView = new Subscribe.Views.Subscribe({ model: subscribe, users: this.users });
	        var subscribeViewEl = subscribeView.render();
	        if(subscribe.get('newItem')){
	            this.$el.prepend(subscribeViewEl.el);
	        } else {
	            this.$el.append(subscribeViewEl.el);
	        }
	    }
	});

	return Subscribe;
});
