define(["backbone","models/marker", "models/filter", "underscore"], function(Backbone, Marker, Filter, _) {

	return Backbone.Collection.extend({
		filter: null,
		url: '/map/filter',
		model: Marker,
		initialize: function() {
			this.filter = window.app.Filter = new Filter();
			this.fetch();

			this.listenTo(this.filter, 'change', this.fetch);
		},

		fetch: function() {
			var self = this;
			var filter = window.app.Filter.toJSON();
			if (!filter.topleft) return false;
			

			Backbone.$.ajax({
				type: 'POST',
				url: this.url,
                data: filter,
				success: function( data ) {
					_.each(self.models, function(marker) { marker.del(); });

					var d = JSON.parse(data);
					if (!d.error) self.reset(d);


				}
			});


		}


	});


});