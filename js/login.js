require(['backbone', 'jquery', 'underscore', 'module/global',  'bootstrap'],  function(Backbone, $, _, Global){
	
	Global.general();
	Global.login();
	

    Backbone.history.start({});
});