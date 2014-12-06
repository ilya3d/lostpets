define(["backbone","models/marker", "models/filter", "underscore"], function(Backbone, Marker, Filter, _) {

	return Backbone.Collection.extend({
		filter: null,
		model: Marker,
		initialize: function() {
			this.filter = window.app.Filter = new Filter();
			this.fetch();

			this.listenTo(this.filter, 'change', this.fetch);
		},

		fetch: function() {
			var self = this;
			Backbone.$.ajax({
				url: this.url,
                filter: window.app.Filter.attributes,
				success: function( data ) {
					_.each(self.models, function(marker) { marker.del(); });
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