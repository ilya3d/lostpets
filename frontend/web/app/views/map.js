define([

	"backbone",
	"underscore",
	"async!http://maps.googleapis.com/maps/api/js?key=AIzaSyDr-WuoW28g6NfwUjOLdzUFV8YP6M4v_Rw&sensor=false"

], function(Backbone, _, Google) {
    
	return Backbone.View.extend({

		map: null,

		option: {
			center: new window.google.maps.LatLng(55.75634, 37.63002),
          	zoom: 8,
          	mapTypeId: window.google.maps.MapTypeId.ROADMAP
		},

		initialize: function() {
			this.locationMarker = null;
			this.listenTo(this.collection, 'reset', this.render );
		},

		render: function() {
			var self = this;
			navigator.geolocation.getCurrentPosition(
				function( position ){
 					if (window.geo){ return; }		
 					window.geo = {
 						lat: position.coords.latitude,
 						lng: position.coords.longitude
 					};
 					self.option.center = new window.google.maps.LatLng(window.geo.lat, window.geo.lng);
					
					window.gmap = self.map = new window.google.maps.Map(self.el, self.option);

					_.each(self.collection.models, function(marker) {
						marker.add();
					});

				},
				function( error ){
					window.geo = {
 						lat: 55.75634,
 						lng: 37.63002
 					};
 					self.option.center = new window.google.maps.LatLng(window.geo.lat, window.geo.lng);
 					window.gmap = self.map = new window.google.maps.Map(self.el, self.option);

					_.each(self.collection.models, function(marker) {
						marker.add();
					});
				},
				{
					timeout: (5 * 1000),
					maximumAge: (1000 * 60 * 15),
					enableHighAccuracy: true
				}
			);

		
		}




	});


})