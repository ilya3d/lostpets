define([ "backbone", "jquery","handlebars", "text!tpl/searchList.html", "collections/info" ],
    function( Backbone, $, Handlebars, html, coll ) {

        return Backbone.View.extend({

            el: '.js-search_list',
            template: '',
            collection: {},

            events: {
                "click .js-sl_back": "goBack",
                "click .js-sl_next": "goNext"
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
                this.listenTo( this.collection, 'all', this.render );
            },

            render: function() {
                //filter: app.Filter.attributes
                $('.js-search_form').addClass( 'map__searchbox2' );
                var tpl = Handlebars.compile( this.template );
                console.log( this.collection.toJSON() );
                this.$el.html( tpl( { items: this.collection.toJSON() } ) );
            },

            refresh: function() {

                this.collection.goSearch();
            },

            goBack: function() {
               // todo
            },

            goNext: function() {
                // todo
            }


        });


    });
