<?php

/*
 * 
 * This file handles system sessions along with the global connection to the database.
 */
ini_set('display_errors', 'On');
require_once('settings.php');
mysql_connect($settings['mysql_host'], $settings['mysql_username'], $settings['mysql_password']);
mysql_select_db($settings['mysql_database']);

session_start();

//globally defined functions
function check_auth() {

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!=true) {
        header("Location: index.php");
        exit;
    }
    
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}



?>
