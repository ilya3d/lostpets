define(["backbone"], function(Backbone){

	return Backbone.Model.extend({

		defaults: {
			lat: 55.75634,
 			lng: 37.63002
		},
		initialize: function() {
			var self = this;
			navigator.geolocation.getCurrentPosition(
				function( position ){
 						
 					self.set({
 						lat: position.coords.latitude,
 						lng: position.coords.longitude
 					});
				},
				function( error ){},
				{
					timeout: (5 * 1000),
					maximumAge: (1000 * 60 * 15),
					enableHighAccuracy: true
				}
			);
			

		}


	});


});