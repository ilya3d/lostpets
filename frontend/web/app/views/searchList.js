define([ "backbone", "jquery","handlebars", "text!tpl/searchList.html" ],
    function( Backbone, $, Handlebars, html ) {

        return Backbone.View.extend({

            el: '.js-search_list',
            template: '',
            cur_pos: 0,
            cur_step: 5,

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

            render: function() {console.log(this.cur_pos);

                var cur_coll = window.app.Collections.Markers.slice( this.cur_pos, this.cur_pos + this.cur_step );
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
                var cnt = window.app.Collections.Markers.length;
                if ( this.cur_pos - this.cur_step < 1 ) {
                    this.cur_pos = 0;
                    $('.js-sl_back').hide();
                } else {
                    this.cur_pos = this.cur_pos - this.cur_step;
                    $('.js-sl_back').show();
                }
                this.render();
            },

            goNext: function() {
                var cnt = window.app.Collections.Markers.length;
                if ( cnt <= this.cur_pos + this.cur_step  ) {
                    this.cur_pos = cnt - this.cur_step;
                    if ( this.cur_pos < 0 )
                        this.cur_pos = 0;
                    $('.js-sl_next').hide();
                } else {
                    this.cur_pos = this.cur_pos + this.cur_step;
                    $('.js-sl_next').show();
                }
                this.render();
            }


        });


    });
