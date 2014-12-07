define([

	"backbone",
	"underscore",
	"async!http://maps.googleapis.com/maps/api/js?key=AIzaSyDr-WuoW28g6NfwUjOLdzUFV8YP6M4v_Rw&sensor=false",
	"models/geo"

], function(Backbone, _, Google, Position) {
    
	return Backbone.View.extend({

		map: null,

		option: {
			center: new window.google.maps.LatLng(55.75634, 37.63002),
          	zoom: 12,
          	minZoom: 10,
          	mapTypeId: window.google.maps.MapTypeId.ROADMAP
          
		},

		initialize: function() {
			this.locationMarker = null;
			this.position = new Position();

			this.listenTo(this.position,   'change', this.setCenter );
			this.initMap();

		},
		initMap: function() {
			this.option.center = new window.google.maps.LatLng(this.position.get('lat'), this.position.get('lng'));	
			window.mapform = this.map = new window.google.maps.Map(this.el, this.option);
					
		},
		setCenter: function() {
			window.mapform.setCenter(new window.google.maps.LatLng(this.position.get('lat'), this.position.get('lng')))
		},

		render: function() {

			

		}




	});


})