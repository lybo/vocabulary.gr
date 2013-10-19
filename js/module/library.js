define(['backbone', 'jquery', 'underscore', 'module/utilize', 'tags_input_master', 'serializeObject'], 
	function(Backbone, $, _, Utilize, mixedTemplates){

	/* Declaration */
	var Library = { Views: {} };

	/* Model */
	Library.Model = Backbone.Model.extend({
		urlRoot: '/library'
	});

	/* Collection */
	Library.Collection = Backbone.Collection.extend({
		url: '/library',
		model: Library.Model
	});

	return Library;
});
