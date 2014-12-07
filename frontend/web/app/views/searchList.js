define([ "backbone", "jquery","handlebars", "text!tpl/searchList.html" ],
    function( Backbone, $, Handlebars, html ) {

        return Backbone.View.extend({

            el: '.js-search_list',
            template: '',
            cur_pos: 0,

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

                this.template = html;
            },

            render: function() {

                var cur_coll = window.app.Collections.Markers.slice( this.cur_pos, this.cur_pos + 5 );
                var items = [];
                _.each( cur_coll, function( row ) {
                    items.push( row.toJSON() );
                });

                //filter: app.Filter.attributes
                $('.js-search_form').addClass( 'map__searchbox2' );
                var tpl = Handlebars.compile( this.template );
                this.$el.html( tpl( {
                    items: items
                } ) );
            },

            goBack: function() {
               // todo
            },

            goNext: function() {
                // todo
            }


        });


    });
