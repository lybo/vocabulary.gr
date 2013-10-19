define(['backbone', 'jquery', 'underscore'], 
	function(Backbone, $, _){
	
	/* Declaration */
	var Lang = { Views: {} };

	/* Model */
	Lang.Model = Backbone.Model.extend();

	/* Collection */
	Lang.Collection = Backbone.Collection.extend({
		model: Lang.Model
	});

	return Lang;
});