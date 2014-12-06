define(["backbone"], function(Backbone){

	return Backbone.Model.extend({

		defaults: {
			position: null
			
		},

		add: function() {

			this.set({
				position: new window.google.maps.LatLng(this.get('lat'),this.get('lng')),
				map: window.gmap
			});

			this.on('destroy' , this.del);
			this.m = new window.google.maps.Marker(this.attributes);
			window.google.maps.event.addListener(this.m, 'click', this.select);


		},
		del: function() {

			 this.m.setMap(null);
		},
		select: function() {
			console.log(this);
		}



	});


});