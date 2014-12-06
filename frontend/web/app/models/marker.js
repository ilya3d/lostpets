define(["backbone"], function(Backbone){

	return Backbone.Model.extend({

		defaults: {
			position: null,
			title: 'New marker'
		},
		add: function() {

			this.set({
				position: window.gmap.getCenter(),
				map: window.gmap
			});

			this.m = new window.google.maps.Marker(this.attributes);

		}


	});


});