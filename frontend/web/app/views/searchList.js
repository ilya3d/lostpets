define([ "backbone", "jquery","handlebars", "text!tpl/searchList.html", "collections/info" ],
    function( Backbone, $, Handlebars, html, coll ) {

        return Backbone.View.extend({

            template: '',
            collection: {},

            events: {
                //"click .js-search_btn": "search",
            },


            initialize: function() {

                //Handlebars.registerHelper('equal', function(lvalue, rvalue, options) {
                //    if (arguments.length < 3)
                //        throw new Error("Handlebars Helper equal needs 2 parameters");
                //    if( lvalue!=rvalue ) {
                //        return options.inverse(this);
                //    } else {
                //        return options.fn(this);
                //    }
                //});

                this.collection = new coll();
                this.template = html;
                this.listenTo( this.collection, 'change', this.render );
            },

            render: function() {

                //filter: app.Filter.attributes

                var tpl = Handlebars.compile( this.template );
                this.$el.html( tpl( { items: this.collection.toJSON() } ) );
            },

            refresh: function() {

                this.collection.fetch();
            }


        });


    });
