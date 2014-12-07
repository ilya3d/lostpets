define(["backbone","views/map","collections/markers","views/searchForm","views/addMapForm"], function(Backbone,Map, Markers,SearchForm, mapForm) {
    
	return Backbone.Router.extend({

		
		routes: {
            "": "index",
            "map": "index",
            "add": "add"
		},
		initialize: function() {

		},
		add: function() {

			//$('#addpointform-point').hide();

			
			$('.field-addpointform-point').append('<div class="map" style="height: 400px;"></div>');
			var map = new mapForm({ el: '.field-addpointform-point .map' });

		},

		index: function() {


			window.app.Collections.Markers = new Markers();
			window.app.Collections.Markers.fetch();
			window.app.Views.Map = new Map({ el: '#map', collection: window.app.Collections.Markers });

            new SearchForm( { el: '.js-search' } );

		}



	})

})