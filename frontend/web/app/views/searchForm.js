define([ "backbone", "jquery" ], function(Backbone, $) {

    return Backbone.View.extend({

        template: '<div><input type="text" value="nyxnyxnyx"><input class="js_search" type="button" value="send"></div>',

        events: {
            "click .js_search": "search"
        },


        initialize: function() {

            this.render();
        },

        render: function() {

            var tpl = _.template( this.template );
            this.$el.html( tpl( { str: 'nyxnyxnyx' } ) );
        },

        search: function() {

            // todo filter params
            var filter = [];

            window.app.Collections.Markers.fetch( filter );
        }


    });


});