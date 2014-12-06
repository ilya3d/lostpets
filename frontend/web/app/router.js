define(["backbone","views/map","views/searchForm"], function(Backbone,Map,SearchForm) {
    
	return Backbone.Router.extend({

		
		routes: {
		    "map": "index"
		},
		initialize: function() {

		},

		index: function() {

			new Map({ el: '#map' });
			new SearchForm({ el: '#search' });

		}



	})

})