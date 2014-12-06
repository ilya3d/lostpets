define(["backbone"], function(Backbone){

	return Backbone.Model.extend({

		defaults: {
	        type: 1,
	        animal: 1
		},
		initialize: function() {

			this.set('_csrf', Backbone.$('meta[name="csrf-token"]').attr('content'));

		}
		


	});


});