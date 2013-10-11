<?php

/* Functionality:	Handle order placement, add to session, add to DB(if ordered)
 * 			Handle post for add to favorites
 * 			Return json for items in session
 * 			Return json for items in favorties
 * 			Return json for flavors:
 * 				- Names of flavors
 * 				- times used
 * 			Return Json for fillings(Names, times used)
 *                               - Names of flavors
 *                               - times used
 * 			Return Json for frosting
 *                               - Names of flavors
 *                               - times used
 * 			Return Json for toppings
 *                               - Names of flavors
 *                               - times used
 * 	
 */

require('global.php');

if (isset($_GET['action'])) {

    //ADD AN ITEM TO THE CART
    if ($_REQUEST['action'] == "addtocart") {
        if (!isset($_SESSION['cart']))
            $_SESSION['cart'] = array();

        //what the added item should look like
        $newitem = array('details' => array('icing' => $_POST['icing'], 'flavor' => $_POST['flavor'], 'filling' => $_POST['filling'], 'toppings' => $_POST['toppings']), 'quantity' => 1);

        //check if the item is already in the cart, if it is, update the quantity
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['details'] == $newitem['details']) {
                if ($_SESSION['cart'][$i]['details']['toppings'] == $newitem['details']['toppings']) {
                    $_SESSION['cart'][$i]['quantity']++;
                    $q_updated_flag = true;
                }
            }
        }

        //if the item wasn't already in the cart, add it!
        if (!isset($q_updated_flag)) {
            $_SESSION['cart'][] = $newitem;
        }

        //OUTPUT THE JSON FOR THE CURRENT USER'S CART
    } elseif ($_REQUEST['action'] == "getcartjson") {

        $jsonarray = array();
        //change things in the array around a little for easier to parse json
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $jsonarray[$i] = $_SESSION['cart'][$i]['details'];
            $jsonarray[$i][] = $_SESSION['cart'][$i]['quantity'];
        }
        echo json_encode($jsonarray);

        //ADD AN ITEM TO THE FAVORITES TABLE IN THE DB
    } elseif ($_REQUEST['action'] == "addtofavorites") {

        //what the added item should look like
        $newitem = array('details' => array('icing' => $_POST['icing'], 'flavor' => $_POST['flavor'], 'filling' => $_POST['filling'], 'toppings' => $_POST['toppings']), 'quantity' => 1);

        mysql_query('INSERT INTO cupcakes (fillingID,frostingID,flavorID,userID,favorite,favorite_name) values("' . $_POST['filling'] . '","' . $_POST['icing'] . '","' . $_POST['flavor'] . '","' . $_SESSION['userdata']['userID'] . '","true","' . $_POST['favorite_name'] . '"') or die(mysql_error());
    } elseif ($_REQUEST['action'] == "placeorder") {
        
        
        //take all the stuff in the cart and shove it into the database
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            
            //first add the cupcake into the database
            mysql_query('INSERT INTO cupcakes (fillingID,frostingID,flavorID,userID,favorite) values("' . $_SESSION['cart'][$i]['details']['filling'] . '","' . $_SESSION['cart'][$i]['details']['icing'] . '","' . $_SESSION['cart'][$i]['details']['flavor'] . '","' . $_SESSION['userdata']['userID'] . '","false"') or die(mysql_error());
            mysql_query('INSERT INTO cupcake_order (cupcakeID,quantity) values("'.mysql_insert_id().'","'.$_SESSION['cart'][$i]['quantity'].'")') or die(mysql_error());
            
            
        }
        
    }
}
?>