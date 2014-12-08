define(["backbone"], function(Backbone){

	return Backbone.Model.extend({

		defaults: {
	        type: [2,4,8],
	        animal: 1
		},
		initialize: function() {

			this.set('_csrf', Backbone.$('meta[name="csrf-token"]').attr('content'));

		}
		


	});


});