define(["backbone","views/map","collections/markers","views/searchForm"], function(Backbone,Map, Markers,SearchForm) {
    
	return Backbone.Router.extend({

		
		routes: {
		    "map": "index"
		},
		initialize: function() {

		},

		index: function() {


			window.app.Collections.Markers = new Markers();
			window.app.Collections.Markers.fetch();
			window.app.Views.Map = new Map({ el: '#map', collection: window.app.Collections.Markers });

            new SearchForm( { el: '.js-search' } );
		}



	})

})