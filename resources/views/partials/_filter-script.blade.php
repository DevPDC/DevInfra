<script>
    var waterTank = [],
        waterCanal = [],
        waterPump = [],
        genSet = [],
        drainage = [],
        building = [],
        trees = [];



    $.ajax({
        url: '{{ route('api/WaterTank') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i<=result.length; i++)
            {
                waterTank.push(result[i].coordinates);
            }
        }
    });

    
    $.ajax({
        url: '{{ route('api/WaterCanal') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i<=result.length; i++)
            {
                waterCanal.push(result[i].coordinates);
            }
        }
    });

    
    $.ajax({
        url: '{{ route('api/WaterPump') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i<=result.length; i++)
            {
                waterPump.push(result[i].coordinates);
            }
        }
    });
    
    $.ajax({
        url: '{{ route('api/GenSet') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i<=result.length; i++)
            {
                genSet.push(result[i].coordinates);
            }
        }
    });


    $.ajax({
        url: '{{ route('api/Drainage') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i<=result.length; i++)
            {
                drainage.push(result[i].coordinates);
            }
        }
    });

    
    $.ajax({
        url: '{{ route('api/Building') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i<=result.length; i++)
            {
                building.push(result[i].coordinates);
            }
        }
    });

    
    $.ajax({
        url: '{{ route('api/Trees') }}',
        method: 'get',
        dataType: 'json',
        data: {
            'X-CSRF-TOKEN':'{{ csrf_token() }}'
        },
        success: function (result) {
            for(i=0; i>=result.length; i++)
            {
                trees.push(result[i].coordinates);
            }
        }
    });
    // var geoGenSet = 

    console.log(waterTank);
    console.log(waterCanal);
    console.log(waterPump);
    console.log(genSet.join());
    console.log(drainage);
    console.log(building);
    console.log(trees);
</script>