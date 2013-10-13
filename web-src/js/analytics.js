function createFlavorChart(flavors){
    var jsonFlavors = flavors;
    var ctx = document.getElementById("flavor").getContext("2d");
    var flavordata = new Array();
    var color = 000000;
    
    for(var i=0;i<14;i++){
        var ordered = false;
        for (var j=0;j<jsonFlavors.length;j++){
            if(jsonFlavors[j].count.flavorID-1 == i){
                flavordata[i] = {value: parseInt(jsonFlavors[j].count.quantity), color: "#"+(color+(i*100))};
                ordered = true;
                break;
            }
        }
        if(ordered === false)
            flavordata[i] = {value: 0, color: "#FFFFFF"};
    }
    //console.log(flavordata);
    var flavorChart = new Chart(ctx).Pie(flavordata);
    
    
    $.ajax({
        type: "POST",
        url: "js/menu.json",
        dataType: "JSON",
        success: function(jsonMenuData){
            var key = "Flavors<br />";
            for(var i=0;i<flavordata.length;i++){
                key += jsonMenuData.menu.cakes[i].flavor +": "+ flavordata[i].color +"<br />";
            }
            
            $("#label1").html(key);
        }
    });
}


function createFillingChart(fillings){
    var jsonFillings = fillings;
    var ctx2 = document.getElementById("filling").getContext("2d");
    var fillingdata = new Array();
    var color = 000000;
    
    for(var i=0;i<9;i++){
        var ordered = false;
        for (var j=0;j<jsonFillings.length;j++){
            if(jsonFillings[j].count.fillingID-1 == i){
                fillingdata[i] = {value: parseInt(jsonFillings[j].count.quantity), color: "#"+(color+(i*100))};
                ordered = true;
                break;
            }
        }
        if(ordered === false)
            fillingdata[i] = {value: 0, color: "#FFFFFF"};
    }
    //console.log(fillings);
    var fillingChart = new Chart(ctx2).Pie(fillingdata);
    
    
    $.ajax({
        type: "POST",
        url: "js/menu.json",
        dataType: "JSON",
        success: function(jsonMenuData){
            var key = "Fillings<br />";
            for(var i=0;i<fillingdata.length;i++){
                key += jsonMenuData.menu.fillings[i].flavor +": "+ fillingdata[i].color +"<br />";
            }
            
            $("#label3").html(key);
        }
    });
}


function createFrostingChart(frostings){
    var jsonFrostings = frostings;
    var ctx3 = document.getElementById("frosting").getContext("2d");
    var frostingdata = new Array();
    var color = 000000;
    
    for(var i=0;i<24;i++){
        var ordered = false;
        for (var j=0;j<jsonFrostings.length;j++){
            if(jsonFrostings[j].count.frostingID-1 == i){
                frostingdata[i] = {value: parseInt(jsonFrostings[j].count.quantity), color: "#"+(color+(i*100))};
                ordered = true;
                break;
            }
        }
        if(ordered === false)
            frostingdata[i] = {value: 0, color: "#FFFFFF"};
    }
    //console.log(jsonFrostings);
    var frostingChart = new Chart(ctx3).Pie(frostingdata);
    
    
    $.ajax({
        type: "POST",
        url: "js/menu.json",
        dataType: "JSON",
        success: function(jsonMenuData){
            var key = "Frosting<br />";
            for(var i=0;i<frostingdata.length;i++){
                key += jsonMenuData.menu.frosting[i].flavor +": "+ frostingdata[i].color +"<br />";
            }
            
            $("#label2").html(key);
        }
    });
}
