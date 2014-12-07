define(["backbone","models/info", "underscore"], function(Backbone, Info, _) {

    return Backbone.Collection.extend({
        filter: null,
        url: '/rest',
        model: Info,
        initialize: function() {
        },

        fetch: function() {
            var self = this;
            Backbone.$.ajax({
                type: 'GET', // todo POST
                url: this.url,
                data: window.app.Filter.attributes,
                success: function( data ) {
                    //_.each(self.models, function(marker) { marker.del(); });
                    //self.reset( JSON.parse( data ) );
                    self.reset( data );
                }
            });


        }


    });


});