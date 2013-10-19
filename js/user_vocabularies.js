require(['backbone', 'jquery', 'underscore', 'module/global', 'module/appsubscribe', 'bootstrap'],  function(Backbone, $, _, Global, AppSubscribe){
	
	Global.general();
	//Global.subscribe();
	
	//var appSubscribeView = new AppSubscribe.View();

    Backbone.history.start({});
});