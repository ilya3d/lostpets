define(["backbone","views/map"], function(Backbone,Map) {
    
	return Backbone.Router.extend({

		
		routes: {
		    "map": "index"
		},
		initialize: function() {

		},

		index: function() {

			new Map({ el: '#map' });

		}



	})

})