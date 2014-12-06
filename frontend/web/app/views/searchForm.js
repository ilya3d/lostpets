define([ "backbone", "jquery","handlebars", "text!tpl/searchForm.html" ], function(Backbone, $, Handlebars, html) {

    return Backbone.View.extend({

        template: '',

        events: {
            "click .js-search_btn": "search",
            "click .js-search_type": "srType",
            "click .js-search_animal": "srAnimal"
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

            app.Filter.set({
                type: $('input[name=type]').val(),
                animal: $('input[name=animal]').val()
            });

        },

        srType: function( itm ) {
            $('.js-search_type').removeClass( 'map__radiolineon' );
            var curType =  $( itm.currentTarget ).addClass( 'map__radiolineon' ).attr( 'tp' );
            $('input[name=type]').val( curType );
        },

        srAnimal: function( itm ) {
            $('.js-search_animal').removeClass( 'map__radiolineon' );
            var curType =  $( itm.currentTarget ).addClass( 'map__radiolineon' ).attr( 'tp' );
            $('input[name=animal]').val( curType );
        }


    });


});