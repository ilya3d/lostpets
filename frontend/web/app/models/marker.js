define(["backbone", "jquery","handlebars", "text!tpl/fancyboxContent.html", "jquery.fancybox"], function(Backbone, $, Handlebars, template){

	return Backbone.Model.extend({

		defaults: {
			position: null
			
		},
		initialize: function(marker) {

			

		},

		add: function() {

			var type = 1;
			if (this.get('type') == 2) type = 1;
			if (this.get('type') == 4) type = 2;
			if (this.get('type') == 8) type = 3;

			this.set({
				position: new window.google.maps.LatLng(this.get('lat'),this.get('lng')),
				map: window.gmap,
				icon: '/images/map.marker.'+this.get('animal_id')+'.'+type+'.png'
			});

			this.on('destroy' , this.del);
			this.m = new window.google.maps.Marker(this.attributes);
			window.google.maps.event.addListener(this.m, 'click', this.select);


		},
		del: function() {

			 this.m.setMap(null);
		},
		select: function() {
			window.app.Router.navigate('/detail/'+this.id, { silent: true });
			var tpl = Handlebars.compile(template);
			$.fancybox( tpl(this), {
                padding: 0,
                afterClose:   function() {
                    window.app.Router.navigate( '/', { silent: true } );
                }
            });

			  

		}



	});


});