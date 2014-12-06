define(["backbone","models/marker", "jquery"], function(Backbone, Marker, $) {

	return Backbone.Collection.extend({

		model: Marker,
		initialize: function() {
			this.fetch();
		},

		fetch: function() {
			var self = this;
			$.ajax({
				url: this.url,
                filter: window.app.Filter.get(),
				success: function( data ) {
					
					self.reset([
						{ lat: '', lng: '', type: 1, animal: { id: 1, title: ''} },
						{ lat: '', lng: '', type: 2, animal: { id: 2, title: ''} },
						{ lat: '', lng: '', type: 3, animal: { id: 3, title: ''} },
						{ lat: '', lng: '', type: 4, animal: { id: 4, title: ''} },
						{ lat: '', lng: '', type: 5, animal: { id: 5, title: ''} },
						{ lat: '', lng: '', type: 6, animal: { id: 6, title: ''} }


						]);

					//self.reset(JSON.parse(data));
				}
			});


		}


	});


});