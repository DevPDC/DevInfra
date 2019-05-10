@extends('layouts.app')




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
    @section('title',"$facility->name")
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}



{{-- Title Section --}}
{{-- --------------- --}}
@section('breadcrumb-title')
    <li class="breadcrumb-item">Facility</li>
    <li class="breadcrumb-item">
        <a href="#">{{ $facility->name }}</a>
    </li>
@endsection
{{-- --------------- --}}
{{-- --------------- --}}




{{-- *********************************************************************** --}}




{{-- Content Section --}}
{{-- --------------- --}}
    @section('content')
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <i class="cui-information"></i> Facility Details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                            <span class="center">
                                    @if($facility->facilityimage()->count() !== 0)
                                        <img src="{{ asset("public/images/".$facility->facilityimage->filename) }}" alt="fasd" style="width:100%">
                                    @else 
                                        <img src="{{ asset("public/images/noimage.png") }}" alt="fasd" style="width:100%">
                                    @endif
                                </span>
                                <hr>
                                @if(Auth::user()->role->role_id === 1 
                                    || Auth::user()->role->role_id === 2 
                                    || Auth::user()->role->role_id === 3
                                    || Auth::user()->role->role_id === 1000)
                                    @if($facility->facilityimage()->count() !== 0)
                                        <a class="btn btn-block btn-sm btn-primary" data-toggle="modal" href="#facilityImageUpdate">Update Image</a>
                                    @else 
                                        <a class="btn btn-block btn-sm btn-danger" data-toggle="modal" href="#facilityImage">Upload Image</a>
                                    @endif
                                @endif
                            </div>
                            <div class="col-md-7">
                                <div class="card">
                                    <div class="card-header" id="headingOne" role="tab">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="">{{ $facility->name }}</a>
                                            <span class="pull-right"><small>Added On: {{ $facility->created_at }}</small></span>
                                        </h5>
                                    </div>
                                    <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                        <div class="card-body">{{ $facility->details }}</div>
                                    </div>
                                </div>
                                @if($facility->infrastructure_id === 4)
                                    <div class="card">
                                        <div class="card-header">Usage Status
                                            <small>animated</small>
                                        </div>
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="1000" style="width: 75%"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-dark">
                                    <div class="card-body">
                                        <table class="table table-hover table-unbordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div id="facility-map"></div>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        <i class="cui-map"></i>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="map" style="margin:0px;padding:0px" width="100%" height="100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    @include('partials._facility-image')
    @include('partials._update-facility-image')
    @endsection
{{-- --------------- --}}
{{-- End Content Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Styles Section --}}
{{-- --------------- --}}
    @section('addStyles')
        {{ Html::style('public/mapping/get-mapping.css') }}
    @endsection
{{-- --------------- --}}
{{-- End Addtl Style Section --}}




{{-- *********************************************************************** --}}




{{-- Additional Scripts Section --}}
{{-- --------------- --}}
    @section('addScripts')
        <script src="{{ asset('public/coreui/js/dataTables.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTables/js/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('public/coreui/js/dataTable-function.js') }}"></script>
        {{ Html::script('public/mapping/libs/leaflet-src.js') }}
        {{ Html::script('public/mapping/src/Leaflet.draw.js') }}
        {{ Html::script('public/mapping/src/Leaflet.Draw.Event.js') }}
        {{ Html::script('public/mapping/libs/leaflet.ajax.min.js') }}
        {{ Html::script('public/mapping/plug-ins/leaflet-search.js') }}
        {{ Html::script('public/mapping/src/Toolbar.js') }}
        {{ Html::script('public/mapping/src/Tooltip.js') }}
        {{ Html::script('public/mapping/src/ext/GeometryUtil.js') }}
        {{ Html::script('public/mapping/src/ext/LatLngUtil.js') }}
        {{ Html::script('public/mapping/src/ext/LineUtil.Intersect.js') }}
        {{ Html::script('public/mapping/src/ext/Polygon.Intersect.js') }}
        {{ Html::script('public/mapping/src/ext/Polyline.Intersect.js') }}
        {{ Html::script('public/mapping/src/ext/TouchEvents.js') }}
        {{ Html::script('public/mapping/src/Control.Draw.js') }}

        <script>
            var map = L.map('facility-map').setView([15.669238, 120.895057], 17),drawnItems = L.featureGroup().addTo(map);

        // 'ESRI' : L.tileLayer('//server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        //     attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
        //     maxZoom: 18,
        L.tileLayer('//{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {
            attribution: 'Map data: &copy; Google Maps',
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            maxZoom: 18,
            minZoom: 0,
            label: 'Google Maps Hybrid'},
            {'drawnlayer': drawnItems}, {position: 'bottomright', collapsed: true}).addTo(map)
        // })


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
            var taskId = "1f56db2a-36d5-4007-9585-3e4227b70aba";
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
    });

            
        map.on(L.Draw.Event.CREATED, function (event) {
            var layer = event.layer,
                type = event.layerType,
                title = event.layerTitle;

                if(type === 'polyline'){
                    layer.bindPopup('This is polyline!');
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
        </script>

        @include('partials._icon-colors')

        <script>
            var facilityid = {!! json_encode($facility->id) !!}
                facilityname = {!! json_encode($facility->name) !!}
                detail = {!! json_encode($facility->details) !!}
                factype = {!! json_encode($facility->infrastructure_id) !!}
                site = {!! json_encode($facility->coordinates) !!};

            console.log(facilityname);
                var js_geo = {!! json_encode($facility->coordinates) !!}
                    console.log(js_geo.toString());
                    var maps = L.geoJSON(JSON.parse(js_geo), {
                        onEachFeature: function (feature, layer){
                            switch(factype) {
                                case 1:
                                    $.ajax({
                                        method: 'post',
                                        data: {
                                            id:facilityid
                                        },
                                        dataType: 'json',
                                        success: function(result)
                                        {
                                            var maintenanceDate = result.maintenance_schedule;
                                        }
                                    })

                                    layer.setIcon(waterTank);
                                    break;
                                case 4:
                                    layer.setIcon(generator);
                                    break;
                                case 7:
                                    layer.setIcon(building);
                                    break;
                                case 8:
                                    layer.setIcon(trees)
                            } 


                            console.log(site);
                            var point = layer.getLatLng();
                            map.setView(point);
                            layer.url = "{{ route('facility.show',"$facility->id") }}";
                            layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title">'+facilityid+'. '+facilityname+'</h3><div class="box-body text-light"><label class="p-popup">'+detail+'</label></div></div>');
                            layer.on('mouseover', function (e){
                                this.openPopup();
                            });
                            layer.on('mouseout', function (e){
                                this.closePopup();
                            });
                            layer.on('dblclick', function (e){
                                window.location = (layer.url);
                            });
                            layer.on('click', function(e){
                                map.setView(e.latlng, 21);
                            });
                        }
                    }).addTo(map);
                    
        </script>
        
        <script>
            $(document).ready(function() {
                $('.dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('serverSideFacilities') }}',
                    columnDefs: [{
                        targets: [0, 1, 2]
                    }]
                });
            });
        </script>
    @endsection
{{-- --------------- --}}
{{-- End Addtl Script Section --}}