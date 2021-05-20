function initialize_gmap() {
    var syndeyLatlang = new google.maps.LatLng(-33.8378536, 151.2072255);
    
    var sydneyOptions = {
        center: syndeyLatlang,
        zoom: 14,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{"featureType":"administrative","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"administrative.country","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#e3e3e3"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"color":"#cccccc"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit.station.airport","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#FFFFFF"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]}]
        };

    var sydneyMap = new google.maps.Map(document.getElementById("gmap"),  sydneyOptions);

    var marker = new google.maps.Marker({
        position: syndeyLatlang,
        map: sydneyMap,
    });
}

var scriptsjs =  document.getElementById( "scripts" );
scriptsjs.addEventListener( "load", function() {
	if ( jQuery(document).find('.has-dot-animation').length > 0 ) {
		animation();

		window.addEventListener( "resize", animation );
	}

	jQuery(document).foundation();

	if (jQuery('#gmap').length > 0 ) {
		initialize_gmap();
	}

	jQuery('.trigger-brand-accordion').on('click', function() {
		jQuery('[data-accordion]').each(function(){
			jQuery(this).foundation('up', jQuery(this).find('[data-tab-content]'));
		});

		var accordion_element = jQuery(this).attr('data-element');
		var equalizer_element = jQuery(accordion_element).find('[data-equalizer]');

		jQuery(accordion_element).foundation('down', jQuery(accordion_element).find('[data-tab-content]'));

		var elem = new Foundation.Equalizer(equalizer_element);
		elem.applyHeight();
	});
});


var lozadjs =  document.getElementById( "lozad" );
lozadjs.addEventListener( "load", function() {
	const observer = lozad(); // lazy loads elements with default selector as '.lozad'
	observer.observe();

	var rW = jQuery(window).width() / jQuery(window).height();
	
	if ( rW > 2 ) {
		jQuery( '#hero-image-fullscreen' ).width( jQuery(window).width() );

	} else {
		jQuery( '#hero-image-fullscreen' ).height( jQuery(window).height() );
	}
});

var slickjs =  document.getElementById( "slick" );
slickjs.addEventListener( "load", function() {
	jQuery('#brand-carousel').slick(
		{
			'lazyLoad': 'ondemand',
			'dots': true,
			'appendDots': jQuery('#brand-carousel-dots-container'),
			'arrows': false,
		});

	jQuery('#product-carousel').slick(
		{
			'lazyLoad': 'ondemand',
			'dots': true,
			'appendDots': jQuery('#product-carousel-dots-container'),
			'customPaging' : function(slider, i) {
				var thumb = jQuery(slider.$slides[i]).data('thumbnail');
				return '<a><img src="' + thumb + '"></a>';
			},
			'arrows': false,
		});

});