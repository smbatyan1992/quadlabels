// Create an array of styles.
//var styles = [];

// Create a new StyledMapType object, passing it the array of styles,
// as well as the name to be displayed on the map type control.
// var styledMap = new google.maps.StyledMapType(styles,
// {name: "Styled Map"});

// Create a map object, and include the MapTypeId to add
// to the map type control.
styles = [
    {
      "featureType": "poi.business",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "poi.park",
      "elementType": "labels.text",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "road.arterial",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "road.highway",
      "elementType": "labels",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    },
    {
      "featureType": "road.local",
      "stylers": [
        {
          "visibility": "off"
        }
      ]
    }
  ];
var maps = document.getElementById("maps");


var mapOptions = {
	zoom: 10,
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
	mapTypeControlOptions: {
	mapTypeIds: [google.maps.MapTypeId.ROADMAP, "map_style"]
	},
	styles: styles
};

coordinates = new google.maps.LatLng(43.7975095, -79.3168359);

mapOptions.center = coordinates;
var map = new google.maps.Map(maps, mapOptions);

var icon = {
    path: "M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z",
    fillColor: "#1ACAB4",
    fillOpacity: 1,
    anchor: new google.maps.Point(192, 516),
    strokeWeight: 0,
    scale: 0.1
}
var Marker = new google.maps.Marker({
    position: coordinates,
    map: map,
    icon: icon,
    optimized: false
});
