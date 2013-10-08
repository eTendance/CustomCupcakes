<?php
/*
 * Allow users to register for an account
 */

require_once('global.php');

//process registration here
if (isset($_POST['fname'])) {
    if (empty($_POST['fname']))
        $error[] = 'First name was left empty';
    if (empty($_POST['lname']))
        $error[] = 'last name was left empty';
    if (empty($_POST['email']))
        $error[] = 'email was left empty';
    if (empty($_POST['username'])) {
        $error[] = 'username cannot be empty';
    }
    if (empty($_POST['password'])) {
        $error[] = 'password cannot be empty';
    }
    if (empty($_POST['telephone'])) {
	$error[] = 'telephone cannot be empty';
    }
    if (empty$_POST['city'])) {
	$error[] = 'city cannot be empty;
    }
    if (empty$_POST['zipcode'])) {
	$error[] = 'zipcode cannot be empty;
    }
    if (!isset($errors)) {
        mysql_query('INSERT INTO users (fname,lname,email,password,usertype) values("' . mysql_real_escape_string($_POST['firstname']) . '","' . mysql_real_escape_string($_POST['lastname']) . '","'
                . mysql_real_escape_string($_POST['email']) . '","' . mysql_real_escape_string($_POST['username']) . '","' . mysql_real_escape_string($_POST['password']) . '","' . mysql_real_escape_string($_POST['type']) . '")') or die(mysql_error());
        echo "account created";
    }
}
?>