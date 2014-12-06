define([ "backbone", "jquery","handlebars", "text!tpl/searchForm.html" ], function(Backbone, $, Handlebars, html) {

    return Backbone.View.extend({

        template: '',

        events: {
            "click .js-search_btn": "search"
        },


        initialize: function() {

            Handlebars.registerHelper('equal', function(lvalue, rvalue, options) {
                if (arguments.length < 3)
                    throw new Error("Handlebars Helper equal needs 2 parameters");
                if( lvalue!=rvalue ) {
                    return options.inverse(this);
                } else {
                    return options.fn(this);
                }
            });

            this.template = html;
            this.render();
        },

        render: function() {

            var tpl = Handlebars.compile( this.template );
            this.$el.html( tpl( { filter: app.Filter.attributes } ) );
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