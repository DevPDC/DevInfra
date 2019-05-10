<script>
var tankIconRed = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'tint',
    markerColor: 'red' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var tankIconBlue = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'tint',
    markerColor: 'blue' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var tankIconOrange = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'tint',
    markerColor: 'orange' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var tankIconGreen = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'tint',
    markerColor: 'green' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var bldgIconRed = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'building',
    markerColor: 'red' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var bldgIconBlue = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'building',
    markerColor: 'blue' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var bldgIconOrange = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'building',
    markerColor: 'orange' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var bldgIconGreen = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'building',
    markerColor: 'green' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/
    
var gensetIconRed = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'bolt',
    markerColor: 'red' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var gensetIconBlue = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'bolt',
    markerColor: 'blue' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var gensetIconOrange = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'bolt',
    markerColor: 'orange' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var gensetIconGreen = L.AwesomeMarkers.icon({
    prefix: 'fa', //font awesome rather than bootstrap
    icon: 'bolt',
    markerColor: 'green' // see colors above
    }); //http://fortawesome.github.io/Font-Awesome/icons/

var treesIconRed = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'red', // see colors above
        icon: 'tree'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var treesIconBlue = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'blue', // see colors above
        icon: 'tree'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var treesIconGreen = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'green', // see colors above
        icon: 'tree'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var treesIconOrange = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'orange', // see colors above
        icon: 'tree'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var pumpIconRed = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'red', // see colors above
        icon: 'product-hunt'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var pumpIconBlue = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'blue', // see colors above
        icon: 'product-hunt'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var pumpIconGreen = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'green', // see colors above
        icon: 'product-hunt'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

var pumpIconOrange = L.AwesomeMarkers.icon({
        prefix: 'fa', //font awesome rather than bootstrap
        markerColor: 'orange', // see colors above
        icon: 'product-hunt'
        }); //http://fortawesome.github.io/Font-Awesome/icons/

</script>
<script>
        
        var allFacilities = [];
        var generators = [];
        var watertanks = [];
        var waterpumps = [];
        var watercanals = [];
        var drainages = [];
        var trees = [];
        var buildings = [];
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        } 
        if (mm < 10) {
            mm = '0' + mm;
        } 
        var today = yyyy + '-' + mm + '-' + dd;
        var newToday = new Date(today);
        var date_diff_indays = function(date1, date2) {
            dt1 = new Date(date1);
            dt2 = new Date(date2);
            return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
        }

        @foreach($facilities as $facility)
            var facilityid = {!! json_encode($facility->id) !!}
            var facilityname = {!! json_encode($facility->name) !!}
            var detail = {!! json_encode($facility->details) !!}
            var factype = {!! json_encode($facility->infrastructure_id) !!}
            var js_geo = {!! json_encode($facility->coordinates) !!}
            var schedule =  {!! json_encode($facility->maintenance_schedule) !!}
            var category =  {!! json_encode($facility->infra_name) !!}
            var newSchedule =  new Date({!! json_encode($facility->maintenance_schedule) !!})
            console.log(newSchedule);
            console.log(newToday);

            var count = date_diff_indays(newSchedule,newToday);
            
            console.log(facilityid+' '+count);
                console.log(js_geo.toString());
                if(factype == 1)
                {
                    
                    var maps = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){
                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setIcon(tankIconOrange);
                            }
                            else if(count == 0)
                            {
                                layer.setIcon(tankIconRed);
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setIcon(tankIconGreen);
                        }
                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties');
                            var facId = $('#fac_id').val();
                            var facName = $('#fac_name').val();
                            var facDetail = $('#fac_detail').val();
                            var facCategory = $('#fac_category').val();
                            var facSchedule = $('#fac_schedule').val();
                            
                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });
                watertanks.push(maps);
            }
            else if(factype == 4)
            {
                var maps_gen = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){
                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setIcon(gensetIconOrange);
                            }
                            else if(count == 0)
                            {
                                layer.setIcon(gensetIconRed);
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setIcon(gensetIconGreen);
                        }

                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties');
                            var facId = $('#fac_id').val();
                            var facName = $('#fac_name').val();
                            var facDetail = $('#fac_detail').val();
                            var facCategory = $('#fac_category').val();
                            var facSchedule = $('#fac_schedule').val();
                            var gensetWrapper = $('#genset-modal-wrapper');

                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });

                generators.push(maps_gen);
            }
            else if(factype == 2)
            {
                var maps_canal = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){
                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setStyle({
                                    color: 'orange'
                                });
                            }
                            else if(count == 0)
                            {
                                layer.setStyle({
                                    color: 'red'
                                });
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setStyle({
                                color: 'green'
                            });
                        }
                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties');
                            var facId = $('#fac_id').val();
                            var facName = $('#fac_name').val();
                            var facDetail = $('#fac_detail').val();
                            var facCategory = $('#fac_category').val();
                            var faSchedule = $('#fac_schedule').val();

                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });

                watercanals.push(maps_canal);
            }
            else if(factype == 3)
            {
                var maps_pumps = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){
                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setIcon(pumpIconOrange);
                            }
                            else if(count == 0)
                            {
                                layer.setIcon(pumpIconRed);
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setIcon(pumpIconGreen);
                        } 
                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties');
                            var facId = $('#fac_id').val();
                            var facName = $('#fac_name').val();
                            var facDetail = $('#fac_detail').val();
                            var facCategory = $('#fac_category').val();
                            var faSchedule = $('#fac_schedule').val();

                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });

                waterpumps.push(maps_pumps);
            }
            else if(factype == 5)
            {
                var maps_drainages = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){
                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setIcon(pumpIconOrange);
                            }
                            else if(count == 0)
                            {
                                layer.setIcon(pumpIconRed);
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setIcon(pumpIconGreen);
                        }
                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties');
                            var facId = $('#fac_id').val();
                            var facName = $('#fac_name').val();
                            var facDetail = $('#fac_detail').val();
                            var facCategory = $('#fac_category').val();
                            var faSchedule = $('#fac_schedule').val();

                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });

                drainages.push(maps_drainages);
            }
            else if(factype == 6)
            {
                var maps_bldgs = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){
                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setIcon(bldgIconOrange);
                            }
                            else if(count == 0)
                            {
                                layer.setIcon(bldgIconRed);
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setIcon(bldgIconGreen);
                        }
                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties');
                            var facId = $('#fac_id').val();
                            var facName = $('#fac_name').val();
                            var facDetail = $('#fac_detail').val();
                            var facCategory = $('#fac_category').val();
                            var faSchedule = $('#fac_schedule').val();

                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });

                buildings.push(maps_bldgs);
            }
            else if(factype == 7)
            {
                var maps_trees = L.geoJSON(JSON.parse(js_geo), {
                    onEachFeature: function (feature, layer){

                        if(count >= -5 && count <= 5)
                        {
                            if(count != 0)
                            {
                                layer.setIcon(treesIconOrange);
                            }
                            else if(count == 0)
                            {
                                layer.setIcon(treesIconRed);
                            }
                        }
                        else if(count <= -5 || count >= 5)
                        {
                            layer.setIcon(treesIconGreen);
                        }

                        layer.url = "{{ route('facility.show',"$facility->id") }}";
                        layer.bindPopup('<div class="box" id="box-dashboard"><h3 class="box-title"><input type="text" id="fac_name" value="'+facilityname+'" hidden><input type="text" id="fac_detail" value="'+detail+'" hidden><input type="text" id="fac_category" value="'+category+'" hidden><input type="text" id="fac_schedule" value="'+schedule+'" hidden><input type="text" id="fac_id" value="'+facilityid+'" hidden>'+facilityid+'. '+facilityname+'</h3><span>Infrastructure Type: '+category+'</span><br><span>Maintenance Schedule: '+schedule+'</span><br><div class="box-body text-light">Details:<br><label class="p-popup">'+detail+'</label></div></div>');
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
                            var propModal = $('#addFacilityProperties'),
                                facId = $('#fac_id').val(),
                                facName = $('#fac_name').val(),
                                facDetail = $('#fac_detail').val(),
                                facCategory = $('#fac_category').val(),
                                facSchedule = $('#fac_schedule').val();

                            $('#addFacilityProperties').modal('show');
                            $('#add_facility_id').val(facId);
                            $('#facility_name').text(facName);
                            $('#facility_description').text(facDetail);
                            $('#facility_schedule').text(facSchedule);
                            $('#facility_category').text(facCategory);
                            $('#category_input').val(facCategory);
                            getSpecs();
                            produceGensetButton()
                        });
                    }
                });

                trees.push(maps_trees);
            };

            function allFacs()
            {
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.addLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.addLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.addLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.addLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.addLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.addLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.addLayer(trees[i]);
                }
            }

        @endforeach
            $('#radio0').click(function(){
                allFacs();
            })

            $('#radio1').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.addLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.removeLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.removeLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.removeLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.removeLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.removeLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.removeLayer(trees[i]);
                }
            });
            
            $('#radio2').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.removeLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.addLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.removeLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.removeLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.removeLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.removeLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.removeLayer(trees[i]);
                }
            });

            $('#radio3').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.removeLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.removeLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.addLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.removeLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.removeLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.removeLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.removeLayer(trees[i]);
                }
            });
            
            $('#radio4').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.removeLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.removeLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.removeLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.addLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.removeLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.removeLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.removeLayer(trees[i]);
                }
            });
            
            $('#radio5').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.removeLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.removeLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.removeLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.removeLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.addLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.removeLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.removeLayer(trees[i]);
                }
            });
            
            $('#radio6').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.removeLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.removeLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.removeLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.removeLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.removeLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.addLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.removeLayer(trees[i]);
                }
            });
            
            $('#radio7').click(function(){
                // Water Tank
                for(i=0; i<watertanks.length; i++)
                {
                    map.removeLayer(watertanks[i]);
                }
                // Water Canal
                for(i=0; i<watercanals.length; i++)
                {
                    map.removeLayer(watercanals[i]);
                }
                // Water Pumps
                for(i=0; i<waterpumps.length; i++)
                {
                    map.removeLayer(waterpumps[i]);
                }
                // Generator Sets
                for(i=0; i<generators.length; i++)
                {
                    map.removeLayer(generators[i]);
                }
                // Drainages
                for(i=0; i<drainages.length; i++)
                {
                    map.removeLayer(drainages[i]);
                }
                // Building
                for(i=0; i<buildings.length; i++)
                {
                    map.removeLayer(buildings[i]);
                }
                // Trees
                for(i=0; i<trees.length; i++)
                {
                    map.addLayer(trees[i]);
                }
            });

            $('.dataBase').on('click','.btn-view', function(){
                var currentRow = $(this).closest('tr');
                var facId = currentRow.find('td:eq(0)').text();
                var facTitle = currentRow.find('td:eq(1)').text();
                var facDetail = currentRow.find('td:eq(2)').text();

                $.ajax({
                    url: "{{ route('api/coordinatesOfFacility') }}",
                    method: 'GET',
                    data: {
                        id:facId
                    },
                    dataType: 'json',
                    success: function(x){
                        // var coor = $.getJson(x)
                        // var geoCoor = L.geoJSON(x.coordinates);
                        var target = L.geoJSON(JSON.parse(x.coordinates),{
                            pointToLayer: function(feature, latlng){
                                map.setView(latlng, 21);
                            }
                        });
                    }
                });
            });

            $(document).ready(function(){
                return allFacs();
            });
    </script>