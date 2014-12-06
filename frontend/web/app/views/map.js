define([

	"backbone",
	"jquery",
	"async!http://maps.googleapis.com/maps/api/js?key=AIzaSyDr-WuoW28g6NfwUjOLdzUFV8YP6M4v_Rw&sensor=false"

], function(Backbone, $, Google) {
    
	return Backbone.View.extend({

		map: null,

		option: {
			center: new window.google.maps.LatLng(-34.397, 150.644),
          	zoom: 8,
          	mapTypeId: window.google.maps.MapTypeId.ROADMAP
		},

		initialize: function() {
			this.render();
		},

		render: function() {

			window.map = this.map = new window.google.maps.Map(this.el, this.option);
		}




	});


})