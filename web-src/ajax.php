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

check_auth();

//delete an item from the cart by removing it from the session
if (isset($_REQUEST['removefromcart'])) {
    unset($_SESSION['cart'][$_REQUEST['removefromcart']]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header('Location:order.php');
    exit;
}

if (!isset($_REQUEST['action'])) {
    die('Specify a valid action');
}

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

    header("Location:order.php");

    //OUTPUT THE JSON FOR THE CURRENT USER'S CART
} elseif ($_REQUEST['action'] == "getcartjson") {

    if (empty($_SESSION['cart']))
        die('0');

    $jsonarray = array();
    //change things in the array around a little for easier to parse json
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        $jsonarray[$i] = $_SESSION['cart'][$i]['details'];
        $jsonarray[$i]['quantity'] = $_SESSION['cart'][$i]['quantity'];
    }
    echo json_encode($jsonarray);

    //ADD AN ITEM TO THE FAVORITES TABLE IN THE DB
} elseif ($_REQUEST['action'] == "addtofavorites") {

    //what the added item should look like
    $newitem = array('details' => array('icing' => $_POST['icing'], 'flavor' => $_POST['flavor'], 'filling' => $_POST['filling'], 'toppings' => $_POST['toppings']), 'quantity' => 1);

    mysql_query('INSERT INTO cupcakes (fillingID,frostingID,flavorID,userID,favorite,`favorite_name`) values("' . $_POST['filling'] . '","' . $_POST['icing'] . '","' . $_POST['flavor'] . '","' . $_SESSION['userdata']['userID'] . '","true","' . $_POST['favorite_name'] . '")') or die(mysql_error());
    foreach($_POST['toppings'] as $topping){
        mysql_query('INSERT INTO cupcake_toppings (cupcakeID,toppingID) values("'.mysql_insert_id().'","'.$topping.'")') or die(mysql_error());
    }
    header("Location:order.php");
} elseif ($_REQUEST['action'] == "getfavoritesjson") {
    $jsonarray = array();
    $query = 'SELECT * FROM cupcakes WHERE userID="' . $_SESSION['userdata']['userID'] . '" and favorite="true"';
    $result = mysql_query($query);

    for ($i = 0; $row = mysql_fetch_assoc($result); $i++) {
        $row['icingID'] = $row['frostingID'];
        unset($row['frostingID']);
        $query = 'SELECT toppingID from cupcake_toppings where cupcakeID=' . $row['cupcakeID'];
        $result2 = mysql_query($query);
        $jsonarray[$i] = $row;
        $jsonarray[$i]['toppings'] = array();
        while ($toppingrow = mysql_fetch_assoc($result2)) {
            $jsonarray[$i]['toppings'][] = $toppingrow['toppingID'];
        }
    }
    echo json_encode($jsonarray);
} elseif ($_REQUEST['action'] == "placeorder") {

    if (count($_SESSION['cart']) > 0) {
        //take all the stuff in the cart and shove it into the database as an order
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            //first add the cupcake into the database
            mysql_query('INSERT INTO cupcakes (fillingID,frostingID,flavorID,userID,favorite) values("' . $_SESSION['cart'][$i]['details']['filling'] . '","' . $_SESSION['cart'][$i]['details']['icing'] . '","' . $_SESSION['cart'][$i]['details']['flavor'] . '","' . $_SESSION['userdata']['userID'] . '","false"') or die(mysql_error());
            mysql_query('INSERT INTO cupcake_order (cupcakeID,quantity) values("' . mysql_insert_id() . '","' . $_SESSION['cart'][$i]['quantity'] . '")') or die(mysql_error());
        }

        header("Location:order.php");

        //empty the cart
        $_SESSION['cart'] = array();
    }
} elseif ($_REQUEST['action'] == "deletefromfavorites"){

    $query = 'DELETE FROM cupcakes WHERE cupcakeID="'.$_REQUEST['id'].'"';
    $result = mysql_query($query);
    //header("Location:order.php);
}
?>
