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

    function areaSelected() {

        var area = $("#area").val();
        $("#suburb").append('<option value="any">Any Suburb</option>');
        for (var i = 0; i < areas.length; i++)
            if (area == areas[i].area)
                suburbs = areas[i].suburbs;

        console.log(suburbs);
        for (var n = 0; n < suburbs.length; n++) {
            var dd = '<option value="' +  suburbs[n] + '">' +  suburbs[n] + '</option> ';
            $("#suburb").append(dd);  
        }

    }

    function regionSelected() {
        var region = $("#region").val();
        $("#area").append('<option value="any">Any Area</option>');
        for (var i = 0; i < regions.length; i++)
            if (region == regions[i].region)
                areas = regions[i].areas;

        for (var n = 0; n < areas.length; n++) {
            var dd = '<option value="' +  areas[n].area + '">' +  areas[n].area + '</option> ';
            $("#area").append(dd);  
        }
    }

    function stateSelected() {
        var state = $("#state").val();
        $("#region").append('<option value="none">Select a Region</option>');
        for (var i = 0; i < data.states.length; i++)
            if (state == data.states[i].state)
                regions = data.states[i].regions;
        
        for (var n = 0; n < regions.length; n++) {
            var dd = '<option value="' +  regions[n].region + '">' +  regions[n].region + '</option> ';
            $("#region").append(dd);  
        }
    }

    function clearDropdowns(select) {
        select
        .find('option')
        .remove()
    }

    $("#state").change(function() {
        clearDropdowns($("#region"));
        clearDropdowns($("#area"));
        clearDropdowns($("#suburb"));
        stateSelected();
    });

    $("#region").change(function () {
        clearDropdowns($("#area"));
        clearDropdowns($("#suburb"));
        regionSelected();
    });

    $("#area").change(function () {
        clearDropdowns($("#suburb"));
        areaSelected();
    });

    if ($("#state").val() != 'none') {
        stateSelected();
    }

    if ($("#region").val() != 'none') {
        regionSelected();
    }

    if ($("#area").val() != 'none') {
        areaSelected();
    }

});