/**
 * Functions related to displaying the large Google Search MPS
 */

//Create the MPS namespace MPS
if (WA.MPS == null || typeof(WA.MPS) != "object") { WA.MPS = new Object();}

WA.MPS = {
		
	map: null,
	geocoder: null,
	address1: null,
	address2: null,
	postcode: null,
	city: null,
	country: null,
	marker: null,
	infowindow: null,
	loader: "../img/ajax-mini-loader.gif",
	
	customIcons : {
		MISC: {
			//icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
			//shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
			icon: '../img/marker-20-red-gradient.png',
			shadow: '../img/marker-20-shadow.png'			
		},
		EARTH: {
			icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png',
			shadow: '../img/marker-20-shadow.png'			
		},
		AIR: {
			icon: '../img/marker-20-red-gradient.png',
			shadow: '../img/marker-20-shadow.png'
		},
		WATER: {
			icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png',
			shadow: '../img/marker-20-shadow.png'			
		},
		SNOW: {
			icon: 'http://labs.google.com/ridefinder/images/mm_20_white.png',
			shadow: '../img/marker-20-shadow.png'			
		}
	},
	
	/**
	* Bind the InfoWindow to the map
	*/
	bindInfoWindow: function(marker, map, infowindow, html) {
	      google.maps.event.addListener(marker, 'click', function() {
	        //if (infoWindow) infoWindow.close(); NOT WORKING
	        WA.MPS.infowindow.setContent(html);
	        WA.MPS.infowindow.open(map, marker);
	      });
	      return marker;
	    },
	

	/**
	* Download the XML file to be used in the map
	*/
	downloadUrl: function(url, callback) {
	      var request = window.ActiveXObject ?
	          new ActiveXObject('Microsoft.XMLHTTP') :
	          new XMLHttpRequest;
	
	      request.onreadystatechange = function() {
	        if (request.readyState == 4) {
	          request.onreadystatechange = WA.MPS.doNothing;
	          callback(request, request.status);
	        }
	      };
	
	      request.open('GET', url, true);
	      request.send(null);
    },
	

	/**
	* As the name suggests, do nothing
	*/
	doNothing: function() {},
	
	/**
	 * Initialise the map with basic controls
	 */
    initMap: function () {
    
        //Initialize the map
		WA.MPS.map = new google.maps.Map(document.getElementById("map"), {
			center: new google.maps.LatLng(0, 0),
			zoom: 2,
			mapTypeId: 'terrain'
		});
		//var infowindow = new google.maps.InfoWindow;
	
		//Load markers from markers.xml file
		WA.MPS.downloadUrl("/operators/markers.xml", function(data) {
//		WA.MPS.downloadUrl("http://kumutu.com/suppliers/markers.xml", function(data) {

			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName("marker");

			for (var i = 0; i < markers.length; i++) {
				var name = markers[i].getAttribute("name");
				var url = markers[i].getAttribute("url");
				var city = markers[i].getAttribute("city");
				var country = markers[i].getAttribute("country");
				var element = markers[i].getAttribute("element");
				var activityType = markers[i].getAttribute("activityType");
				var description = markers[i].getAttribute("description");
				var image = markers[i].getAttribute("image");

				var type = markers[i].getAttribute("type");
				var point = new google.maps.LatLng(
					parseFloat(markers[i].getAttribute("lat")),
					parseFloat(markers[i].getAttribute("lng")));
				var html = "<div class=\"gmapmarker\"><div class=\"content\"><p class=\"name\"><a href=\""+
					url + "\">" + name + "</a></p>" + "<p class=\"location\">" + activityType +
					" in " + city + ", " + country + "</p>" + "<div class=\"description\">" +
					description + "</div></div>" + 
					"<div class=\"image\"><img src=\"../img/operators/thumb/" +
					image + "\"></div></div>";
				//var icon = WA.MPS.customIcons[type] || {};
				var icon = WA.MPS.customIcons[element] || {};
				var marker = new google.maps.Marker({
					map: WA.MPS.map,
					position: point,
					icon: icon.icon,
					shadow: icon.shadow
				});
				WA.MPS.infowindow = new google.maps.InfoWindow({
				    maxWidth: 400
				});
				WA.MPS.bindInfoWindow(marker, WA.MPS.map, WA.MPS.infowindow, html);
			    $('#map-loader').hide();
			}			
		});


    },

	
	/**
	 * Placeholder function in case we want to add any additional markers
	 */
	loadMarkers: function() {
        
        var point = new google.maps.LatLng(73, -39);
		var marker_2 = new google.maps.Marker({
			map: WA.MPS.map,
			position: point,

		});
	                      
        marker_2.setMap(WA.MPS.map);
	},
	
};

$(document).ready(function(){
	WA.MPS.initMap();
	WA.MPS.loadMarkers();

});