require(["backbone","map"], function(Backbone, google) {
    
	return Backbone.View.extend({

		el: 'div',
		map: null,

		option: {
			center: new google.maps.LatLng(-34.397, 150.644),
          	zoom: 8,
          	mapTypeId: google.maps.MapTypeId.ROADMAP
		},

		initialize: function() {
			this.render();
		},

		render: function() {
			window.map = this.map = new google.maps.Map(this.$el, this.option);
		}




	});


})