define([ "backbone", "jquery", "text!tpl/searchForm.html" ], function(Backbone, $, html) {

    return Backbone.View.extend({

        template: '',

        events: {
            "click .js-search_btn": "search"
        },


        initialize: function() {
            this.template = html;
            this.render();
        },

        render: function() {

            var tpl = _.template( this.template );
            this.$el.html( tpl( { str: 'nyxnyxnyx' } ) );
        },

        search: function() {

            // todo filter params
            //var filter = {
            //    animal: 1,
            //    type: 1,
            //    topleft: [],
            //    topright: [],
            //    botleft: [],
            //    botright: []
            //};

            window.app.Collections.Markers.fetch();
        }


    });


});