define([ "backbone", "jquery","handlebars", "text!tpl/searchList.html" ],
    function( Backbone, $, Handlebars, html ) {

        return Backbone.View.extend({

            el: '.js-search_list',
            template: '',
            cur_pos: 0,
            cur_step: 5,

            events: {
                "click .js-sl_back": "goBack",
                "click .js-sl_next": "goNext",
                "click .js-pnt_title": "goToPoint"
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
                this.listenTo( window.app.Collections.Markers, 'reset', this.render );
            },

            render: function() {

                var cnt = window.app.Collections.Markers.length;

                if ( cnt ) {
                    var cur_coll = window.app.Collections.Markers.slice( this.cur_pos, this.cur_pos + this.cur_step );
                    var items = [];
                    _.each( cur_coll, function( row ) {
                        items.push( row.toJSON() );
                    });

                    $('.js-search_form').addClass( 'map__searchbox2' );
                    var tpl = Handlebars.compile( this.template );
                    this.$el.html( tpl( {
                        items: items,
                        btn_back: (this.cur_pos - this.cur_step < 1),
                        btn_next: (this.cur_pos + this.cur_step >= cnt)
                    } ) );
                } else {
                    $('.js-search_form').removeClass( 'map__searchbox2' );
                    this.$el.html( '' );
                }


            },

            goBack: function() {
                var cnt = window.app.Collections.Markers.length;
                if ( this.cur_pos - this.cur_step < 1 ) {
                    this.cur_pos = 0;
                } else {
                    this.cur_pos = this.cur_pos - this.cur_step;
                }
                this.render();
            },

            goNext: function() {
                var cnt = window.app.Collections.Markers.length;
                if ( cnt <= this.cur_pos + this.cur_step  ) {
                    this.cur_pos = cnt - this.cur_step;
                    if ( this.cur_pos < 0 )
                        this.cur_pos = 0;
                } else {
                    this.cur_pos = this.cur_pos + this.cur_step;
                }
                this.render();
            },

            goToPoint: function( itm ) {

                var lat = $( itm.currentTarget).attr('lat');
                var lng = $( itm.currentTarget).attr('lng');

                window.gmap.setCenter( new window.google.maps.LatLng( lat, lng ) );

                console.log( lat, lng );
            }


        });


    });
