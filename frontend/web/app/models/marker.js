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