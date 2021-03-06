function translateCart(itemID, cartData){
    $.ajax({
        type: "POST",
        url: "js/menu.json",
        dataType: "JSON",
        success: function(jsonMenuData){
            var cartID = "#cart"+itemID;
            var flavorNum = cartData[itemID].flavor -1;
            var fillingNum = cartData[itemID].filling -1;
            var icingNum = cartData[itemID].icing -1;
            var toppingNums = cartData[itemID].toppings;
            var quantity = cartData[itemID].quantity;
            
            var flavor = jsonMenuData.menu.cakes[flavorNum].flavor;
            var filling = jsonMenuData.menu.fillings[fillingNum].flavor;
            var icing = jsonMenuData.menu.frosting[icingNum].flavor;
            var toppings = new Array();
            for (var i=0;i<toppingNums.length;i++)
            {
                var next = toppingNums[i] -1;
                toppings.push(jsonMenuData.menu.Toppings[next]);
            }
            
            var cupcake = "Flavor: "+flavor+"<br />Filling: "+filling+"<br />Frosting: "+icing+"<br />Toppings:<br />";
            for(var i=0;i<toppings.length;i++)
            {
                cupcake += (i+1)+") "+toppings[i]+"<br />";
            }
            
            $(cartID).html(cupcake);
            //console.log(cupcake);
        }
    });
}

function cartItem(itemID){
    $.ajax({
        type: "POST",
        url: "./ajax.php",
        data: {action: "getcartjson"},
        success: function(cart){            
            var jsonCartData = JSON.parse(cart);
            translateCart(itemID, jsonCartData);
            //console.log(jsonCartData);
        }
    });
}


function translateFavorites(favoritesData){
    $.ajax({
        type: "POST",
        url: "js/menu.json",
        dataType: "JSON",
        success: function(jsonMenuData){
            var favoriteNames = new Array();
            var favoriteFlavors = new Array();
            var favoriteFillings = new Array();
            var favoriteFrostings = new Array();
            var favoriteToppings = new Array();
            for(var i=0;i<favoritesData.length;i++)
            {
                favoriteNames.push(favoritesData[i].favorite_name);
                favoriteFlavors.push(jsonMenuData.menu.cakes[favoritesData[i].flavorID -1].flavor);
                favoriteFillings.push(jsonMenuData.menu.fillings[favoritesData[i].fillingID -1].flavor);
                favoriteFrostings.push(jsonMenuData.menu.frosting[favoritesData[i].icingID -1].flavor);
                favoriteToppings.push(favoritesData[i].toppings);
                //console.log(favoriteToppings[i]);
            }
            
            var favorite = new Array();
            for(var i=0;i<favoritesData.length;i++)
            {
                favorite[i] = "<br /><br />Name: "+favoriteNames[i]+"<br />Flavor: "+favoriteFlavors[i]+"<br />Filling: "+favoriteFillings[i]+"<br />Frosting: "+favoriteFrostings[i]+"<br />Toppings:";
                for (var j=0;j<favoriteToppings[i].length;j++)
                {
                    favorite[i] += (j+1)+") "+jsonMenuData.menu.Toppings[favoriteToppings[i][j]]+"<br />";
                }
                
                //favorite[i] += "<button type='submit' name='action' value='deletefromfavorites'>remove</button>"
            }
            
            $("#Favorites div").html(favorite);
        }
    });
}


function favoriteItems(){
    $.ajax({
        type: "POST",
        url: "./ajax.php",
        data: {action: "getfavoritesjson"},
        success: function(favorites){
            var jsonFavoritesData = JSON.parse(favorites);
            translateFavorites(jsonFavoritesData);
            //console.log(jsonFavoritesData);
        }
    });
}



