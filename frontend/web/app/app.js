require(["backbone","router","map"], function(Backbone, Router) {
    
	var app = window.app = {

		Router: new Router(),
		Models: {},
		Collections: {},
		Views: {}

	}



	Backbone.history.start();


})