define([ "backbone", 
         "jquery",
         "handlebars", 
         "text!tpl/searchForm.html",
         "async!http://maps.googleapis.com/maps/api/js?key=AIzaSyDr-WuoW28g6NfwUjOLdzUFV8YP6M4v_Rw&sensor=false"
         ], function(Backbone, $, Handlebars, html, Google) {

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
            //$('.js-search_animal').removeClass( 'map__radiolineon' );
            //var curType =  $( itm.currentTarget ).addClass( 'map__radiolineon' ).attr( 'tp' );
            //$('input[name=animal]').val( curType );
            var res = [];
            $( itm.currentTarget).toggleClass( 'map__radiobtnon' );
            $('.map__radiobtnon').each( function() {
                res.push( $(this).attr( 'tp' ) );
            });
            $('input[name=animal]').val( res );
        }


    });


});