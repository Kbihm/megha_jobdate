$.getJSON("/regions.json", function(data) {

    console.log(data);

    var regions;
    var areas;
    var suburbs;

    // Populate States
    for (var i = 0; i < data.states.length; i++) {
        var dd = '<option value="' +  data.states[i].state + '">' +  data.states[i].state + '</option> ';
        $("#state").append(dd);
    }

    $("#state-loading").remove();

    $("#state").change(function() {
        var state = $("#state").val();
        $("#area").val('Any').text('Any');
        $("#suburb").val('Any');
        $("#region").val('Any');

        for (var i = 0; i < data.states.length; i++)
            if (state == data.states[i].state)
                regions = data.states[i].regions;
        
        for (var n = 0; n < regions.length; n++) {
            var dd = '<option value="' +  regions[n].region + '">' +  regions[n].region + '</option> ';
            $("#region").append(dd);  
        }

    });

    $("#region").change(function () {

        var region = $("#region").val();

        for (var i = 0; i < regions.length; i++)
            if (region == regions[i].region)
                areas = regions[i].areas;

        for (var n = 0; n < areas.length; n++) {
            var dd = '<option value="' +  areas[n].area + '">' +  areas[n].area + '</option> ';
            $("#area").append(dd);  
        }

    });

    $("#area").change(function () {

        var area = $("#area").val();
        for (var i = 0; i < areas.length; i++)
            if (area == areas[i].area)
                suburbs = areas[i].suburbs;

        console.log(suburbs);
        for (var n = 0; n < suburbs.length; n++) {
            var dd = '<option value="' +  suburbs[n] + '">' +  suburbs[n] + '</option> ';
            $("#suburb").append(dd);  
        }

    });


});