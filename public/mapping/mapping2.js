            
            

var tilelayer = L.tileLayer('//{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
    attribution: 'Map data: &copy; Google Maps',
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 18,
    minZoom: 0,
    label: 'Google Maps Hybrid'}, {position: 'topleft', collapsed: true});

    var map = L.map('philrice-map')
            .addLayer(tilelayer)
            .setView([15.669238, 120.895057], 17);


            console.log(JSON.stringify(allMarkersResult[0][infrastructure_id]));
    var promise = $.getJSON(allMarkersResult);
    // console.log(
    //     $.each(allMarkersResult.coordinates,function(result) {
    //         return result;
    //     })
    // );
    promise.then(function(promise) {
        var allmarkers = L.geoJson(data);
            var gensets = L.geoJson(data, {
                filter: function(feature, layer) {
                    var id = data.infrastructure_id;
                    return id == "4";
                },
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: generator
                    }).on('mouseover', function() {
                        this.bindPopup(feature.properties.coordinates).openPopup();
                    });
                }
            });
            var others = L.geoJson(data.coordinates, {
                filter: function(feature, layer) {
                    var id = data.infrastructure_id;
                    return id != "4";
                },
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                    }).on('mouseover', function() {
                        this.bindPopup(feature.properties.coordinates).openPopup();
                    });
                }
            });
            
            map.fitBounds(allmarkers.getBounds(), {
                padding: [50, 50]
            });
            gensets.addTo(map)
            others.addTo(map)
            // The JavaScript below is new
            $("#infra3").click(function() {
                map.addLayer(others)
                map.removeLayer(gensets)
            });
            $("#infra4").click(function() {
                map.addLayer(gensets)
                map.removeLayer(others)
            });
            $("#allbus").click(function() {
                map.addLayer(gensets)
                map.addLayer(others)
            });
        });
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
            var taskId = "13050564-ca42-4bda-bb32-aa47b02d1b4d";
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
                        map.fitBounds(bounds);
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