<?php
/* Functionality:	Handle order placement, add to session, add to DB(if ordered)
*			Handle post for add to favorites
*			Return json for items in session
*			Return json for items in favorties
*			Return json for flavors:
*				- Names of flavors
*				- times used
*			Return Json for fillings(Names, times used)
*                               - Names of flavors
*                               - times used
*			Return Json for frosting
*                               - Names of flavors
*                               - times used
*			Return Json for toppings
*                               - Names of flavors
*                               - times used
*	
*/
if(isset(z$_GET['action'])){

	if($_GET['action']=="addtoorder"){
		//add item to session var 
	} elseif($_GET['action']=="addtofavorites"){
	} elseif($_GET['action']=="placeorder"){
	
	}

}

$con = mysql_connect($settings["mysql_host"], $settings["mysql_username"], $settings["mysql_password"]);
        if(!$con){
                die("Could not connect: " . mysql_error());
        }
        mysql_select_db($settings["mysql_database"], $con) 
                or die("Unable to select database:" . mysql_error());

        $query = "select filling from fillings where id = '";
        
        mysql_close($con);
?>