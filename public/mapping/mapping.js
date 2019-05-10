var map = L.map('philrice-map').setView([15.673412, 120.8904], 18),
drawnItems = L.featureGroup().addTo(map);

L.control.layers({
'ESRI' : L.tileLayer('//server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
    maxZoom: 18,
    minZoom: 10,
    label: 'ESRI Satellite'
    }).addTo(map),
"Google Maps Hybrid": L.tileLayer('//{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
    attribution: 'Map data: &copy; Google Maps',
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 18,
    minZoom: 0,
    label: 'Google Maps Hybrid'
}),
'Esri_WorldTopoMap': L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ, TomTom, Intermap, iPC, USGS, FAO, NPS, NRCAN, GeoBase, Kadaster NL, Ordnance Survey, Esri Japan, METI, Esri China (Hong Kong), and the GIS User Community'
})
}, {'drawnlayer': drawnItems}, {position: 'topleft', collapsed: true}).addTo(map);


$.ajax({
    type: "POST",
    crossDomain: true,
    url: 'http://122.3.235.113:8000/api/token-auth/',
    data: {'username': 'smsppd', 'password': 'E56C0472170C82E4AC16AF2EDC895C86579B2D8E2E72D41C80132B3A65F8E4CD'},
    dataType: 'json',
    xhrFields: {
        'withCredentials': true
    },
    success: function(res) {
        webodmtoken = res['token']; 
        loadFutureRiceFarm();
    },
    error: function() {
    alert("Failed to sign-in to Philrice maps. Please try again later");
    }
});

function loadFutureRiceFarm() {
$.ajax({
    type: "GET",
    url: 'http://122.3.235.113:8000/api/projects?description=CES-000-000&jwt='+webodmtoken,
    dataType: 'json',
    success: function(response) {
    var projId = response.results[0].id;
    var taskId = "d56db518-7165-4acf-b7d2-1605f6df0017";
    // var taskId = "13050564-ca42-4bda-bb32-aa47b02d1b4d";
        $.ajax({
            type: "GET",
            url: 'http://122.3.235.113:8000/api/projects/'+projId+'/tasks/'+taskId+'/orthophoto/tiles.json?jwt='+webodmtoken,
            dataType: 'json',
            success: function(response1) {
            bounds = L.latLngBounds(
                [response1.bounds.slice(0, 2).reverse(), response1.bounds.slice(2, 4).reverse()]
            );
            stationArea = L.tileLayer(
                'http://122.3.235.113:8000'+response1.tiles[0]+'?jwt='+webodmtoken, {
                bounds,
                attribution: 'Philrice Maps@futurerice',
                maxZoom: response1.maxzoom,
                minZoom: response1.minzoom,
                tms: response1.scheme === 'tms',
                });
                stationArea.addTo(map);
            },
            error: function(){
            alert("Failed to load. please check your internet connection and try again");
            }
        });
    },
    error: function(){
    alert("Failed to load. please check your internet connection and try again");
    }
});
}

// TENTATIVE

$(document).ready(function() {
map.addLayer(drawnItems);
// map.setView([120.8904,15.673412],18);
});



var drawnControl = new L.Control.Draw({
    edit: {
        featureGroup: drawnItems,
        showArea: true,
        polygon: {
            shapeOptions: {
                color: 'green',
                opacity: 0.8
            }
        }
    },
    draw: {
        showArea: true,
        polygon: {
            shapeOptions: {
                color: 'green',
                opacity: 0.8
            }
        },
        circle: false,
        rectangle: false,
        circlemarker: false
    },
    position: 'bottomright'
});

map.addControl(drawnControl);
drawnControl.getPosition();

L.DrawToolbar.include({
    getModeHandlers: function (map) {
        return [
            {
                enabled: true,
                handler: new L.Draw.Marker(map, { icon: new RestaurantIcon() }),
                title: 'Place restaurant marker'
            },
            {
                enabled: true,
                handler: new L.Draw.Marker(map, { icon: new GasStationIcon() }),
                title: 'Place gas station marker'
            },
            {
                enabled: true,
                handler: new L.Draw.Marker(map, { icon: new HospitalIcon() }),
                title: 'Place hospital marker'
            }
        ];
    }
});
// var _round = function(num, len) {
//     return Math.round(num*(Math.pow(10, len)))/(mathpow(10, len));
// };

// var strlatlng = function(latLng) {
//     return "("+_round(latLng.lat, 6)+", "+_round(latLng.lng, 6)+")";
// };

// var getPopupContent = function(layer) {
//     // Marker - add lat/long
//     if (layer instanceof L.Marker || layer instanceof L.CircleMarker) {
//         return strLatLng(layer.getLatLng());
//     // Circle - lat/long, radius
//     } else if (layer instanceof L.Circle) {
//         var center = layer.getLatLng(),
//             radius = layer.getRadius();
//         return "Center: "+strLatLng(center)+"<br />"
//               +"Radius: "+_round(radius, 2)+" m";
//     // Rectangle/Polygon - area
//     } else if (layer instanceof L.Polygon) {
//         var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
//             area = L.GeometryUtil.geodesicArea(latlngs);
//         return "Area: "+L.GeometryUtil.readableArea(area, true);
//     // Polyline - distance
//     } else if (layer instanceof L.Polyline) {
//         var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs(),
//             distance = 0;
//         if (latlngs.length < 2) {
//             return "Distance: N/A";
//         } else {
//             for (var i = 0; i < latlngs.length-1; i++) {
//                 distance += latlngs[i].distanceTo(latlngs[i+1]);
//             }
//             return "Distance: "+_round(distance, 2)+" m";
//         }
//     }
//     return null;
// // };
// var controlSearch = new L.Control.Search({
//     position:'bottomleft',		
//     layer: drawnItems,
//     initial: false,
//     zoom: 12,
//     marker: false
// });

// map.addControl( controlSearch );

map.on(L.Draw.Event.CREATED, function (event) {
    var layer = event.layer,
        type = event.layerType,
        title = event.layerTitle;

        if(type === 'polyline'){
            layer.bindPopup('This is polyline!');
            drawnItems.addLayer(layer);

            latLangs = layer.getLatLngs();
            console.log(latLangs);

            var coordinates = JSON.stringify(layer.toGeoJSON(latLangs));
            document.getElementById('coordinates').value = coordinates;

            console.log('draw:created->');
            console.log(coordinates);
        }
        else if(type === 'polygon'){
            layer.bindPopup('This is polygon!');
            drawnItems.addLayer(layer);

            latLangs = layer.getLatLngs();
            console.log(latLangs);

            var coordinates = JSON.stringify(layer.toGeoJSON(latLangs));
            document.getElementById('coordinates').value = coordinates;

            console.log('draw:created->');
            console.log(coordinates);

            var seeArea = L.GeometryUtil.geodesicArea(latLangs);
            console.log(seeArea.toString());
        }
        else if(type === 'marker')
        {
            layer.bindPopup('Coordinates: ' + layer.getLatLng()).openPopup();
            drawnItems.addLayer(layer);
            
            var coordinates = JSON.stringify(layer.toGeoJSON(layer.getLatLng()));
            document.getElementById('coordinates').value = coordinates;

            console.log('draw:marker->');
            console.log(coordinates);
        }

});

// map.on(L.Draw.Event.EDITED, function(event){
//     var layers = event.layers;
//     layers.eachLayer(function(layer) {
//         content = getPopupContent(layer);
//         if (content !== null) {
//             layer.setPopupContent(content);
//         }
//     })
// });













