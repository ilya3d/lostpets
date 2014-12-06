require(["backbone","router"], function(Backbone, Router) {

    var SearchFilter = {
        x1: 0,
        x2: 0,
        y1: 0,
        y2: 0,
        type: 1,
        animal: 1,
        get: function() {
            return {
                x1: this.x1,
                x2: this.x2,
                y1: this.y1,
                y2: this.y2,
                type: this.type,
                animal: this.animal
            };
        }
    };

	var app = window.app = {

        Filter: SearchFilter,
		Router: new Router(),
		Models: {},
		Collections: {},
		Views: {}

	};






	Backbone.history.start({ pushState: true });


});