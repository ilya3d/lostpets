
define([ "backbone", "jquery","handlebars", "text!tpl/searchForm.html", "views/searchList" ],
    function(Backbone, $, Handlebars, html, SearchList ) {

    return Backbone.View.extend({

        template: '',

        showList: {},

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

            this.showList = new SearchList( {} );
        },

        search: function() {

            app.Filter.set({
                type: $('input[name=type]').val().split(','),
                animal: $('input[name=animal]').val().split(',')
            });
           
            var geocoder = new window.google.maps.Geocoder();
            geocoder.geocode( { 'address':  $('.js-search-input').val()}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                  window.gmap.setCenter(results[0].geometry.location);
                
                }
            });
        },

        srType: function( itm ) {
            var res = [];
            $( itm.currentTarget).toggleClass( 'map__radiolineon' );
            $('.map__radiolineon').each( function() {
                res.push( $(this).attr( 'tp' ) );
            });
            $('input[name=type]').val( res );
        },

        srAnimal: function( itm ) {
            var res = parseInt( $( itm.currentTarget).attr( 'tp' ) );
            [1,2,3].forEach( function( i ) {
                if ( i != res ) {
                    $( '.map__radiobtnon' + i ).removeClass( 'map__radiobtnon' + i );
                }
            });
            $( itm.currentTarget ).addClass( 'map__radiobtnon' + res );
            $('input[name=animal]').val( res );
        }


    });


});