<script>
        var waterTank = L.icon({
            iconUrl: '{{ asset("public/storage/icon/watertower.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var waterTankAlert = L.icon({
            iconUrl: '{{ asset("public/storage/icon/watertower-alert.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var waterTankWarning = L.icon({
            iconUrl: '{{ asset("public/storage/icon/watertower-warning.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var waterTankSuccess = L.icon({
            iconUrl: '{{ asset("public/storage/icon/watertower-success.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
            
        var generator = L.icon({
            iconUrl: '{{ asset("public/storage/icon/powersubstation.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
            
        var generatorAlert = L.icon({
            iconUrl: '{{ asset("public/storage/icon/powersubstation-alert.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var generatorWarning = L.icon({
            iconUrl: '{{ asset("public/storage/icon/powersubstation-warning.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var generatorSuccess = L.icon({
            iconUrl: '{{ asset("public/storage/icon/powersubstation-success.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
            
        var building = L.icon({
            iconUrl: '{{ asset("public/storage/icon/office-building.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
            
        var buildingAlert = L.icon({
            iconUrl: '{{ asset("public/storage/icon/office-building-alert.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var buildingWarning = L.icon({
            iconUrl: '{{ asset("public/storage/icon/office-building-warning.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var buildingSuccess = L.icon({
            iconUrl: '{{ asset("public/storage/icon/office-building-success.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        var trees = L.icon({
            iconUrl: '{{ asset("public/storage/icon/tree.png") }}',
        
            iconSize:     [38, 45], // size of the icon
            iconAnchor:   [22, 35], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
    </script>