
var map;

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -37.82, lng: 144.94},
		zoom: 10
    });
}

var stations = [
	[88162, 'Wallan (Kilmore Gap)', 144.97, -37.38],
	[87166, 'Point Wilson',	144.54,	-38.10], 
	[87113,	'Avalon Airport', 144.48, -38.03],
	[87031,	'Laverton RAAF', 144.76, -37.86],
	[86383,	'Coldstream', 145.41, -37.32],
	[86375,	'Cranbourne Botanic Gardens', 145.26, -38.13],
	[86371,	'Frankston AWS', 145.12, -38.15],
	[86364,	'Tarrawarra Monastery', 145.45, -37.66],
	[86351,	'Bundoora (Latrobe University)', 145.05, -37.72],
	[86344,	'South Channel Island', 144.80, -38.31],
	[86338,	'Melbourne (Olympic Park)', 144.98, -37.83],
	[86282,	'Melbourne Airport', 144.83, -37.67],
	[86266,	'Ferny Creek', 145.35, -37.87],
	[86224,	'Dandenong', 145.22, -37.98],
	[86104,	'Scoresby Research Institute', 145.26, -37.87],
	[86085,	'Narre Warren North', 145.33, -37.99],
	[86079,	'Mornington', 145.07, -38.24],
	[86077,	'Moorabbin Airport', 145.10, -37.98],
	[86068,	'Viewbank', 145.10, -37.74],
	[86038,	'Essendon Airport', 144.91, -37.73]
];

var temp = [32, 35, 39, 40, 46, 30, 22, 23, 43, 25, 39, 37, 36, 39, 40, 37, 38, 39, 35, 40];

function temp_marker() {
	for (var i = 0; i < stations.length; i++) {
		var station = stations[i];
		var marker = new google.maps.Marker({
			position: {lat: station[3], lng: station[2]},
			map: map,
			title: station[1]
		});
	addInfo(marker, station, i);
	}
}

function addInfo(marker, station, x) {
	var contentString = '<div id="content">'+
		'<h1>'+ station[1] +'</h1>'+
		'<div id="body_content">'+
		'<p>Station Number: '+ station[0] +'</p>'+
		'<p>Latitude: '+ station[3] +'</p>'+
		'<p>Longitude: '+ station[2] +'</p>'+
		'<p>Max temperature: '+ temp[x] +'</p>'+
		'</div></div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	marker.addListener('click', function() {infowindow.open(map, marker);});
}

		