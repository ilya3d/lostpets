define(["backbone"], function(Backbone){

	return Backbone.Model.extend({

		defaults: {
	        type: [],
	        animal: []
		},
		initialize: function() {

			this.set('_csrf', Backbone.$('meta[name="csrf-token"]').attr('content'));

		}
		


	});


});