
// Google Maps
function initialize() {

	directionsDisplay = new google.maps.DirectionsRenderer();

	var myLatlng = new google.maps.LatLng(-23.594900, -46.687064);
      var myLatlngCenter = new google.maps.LatLng(-23.594900, -46.687064);
	var styles = [
		{
	    	stylers: [
	      		//{ hue: '#2080a1' },
                        { hue: '#4597b1' },
	      		{ saturation: 1 },
      			{lightness: 0},
	    	]
	  	},{
	    	featureType: "road.arterial",
	    	elementType: "geometry",
	    	stylers: [
	      		{ lightness: 100 },
	      		{ visibility: "simplified" }
	    	]
	  	},{
	    	featureType: "road",
	    	elementType: "labels",
	    	stylers: [
	      		{ visibility: "on" }
	    	]
	  	},{
      		featureType: "poi",
      		elementType: "labels",
      		stylers: [
        		      { "visibility": "off" }
      		]
	  	}
	];

	var myOptions = {
		zoom:14,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: myLatlngCenter,
		scrollwheel: false,
	      navigationControl: false,
	      mapTypeControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: styles,
            scroll:{x:$(window).scrollLeft(),y:$(window).scrollTop()}
	}

	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: 'Equals',
            //icon: '../wp-content/themes/...'
	});

      /*infowindow.open(map, marker);
      marker.addListener('click', function() {
          infowindow.open(map, marker);
    	});*/

	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("directionsPanel"));
}
