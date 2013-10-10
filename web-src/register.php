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

//got the code for connecting to mysql from: http://www.w3schools.com/php/php_mysql_insert.asp
$con=mysqli_connect("../database-dumps/cupcakes.sql");
if(mysqli_connect_errno($con)) {
	echo "Failed to connec to MySQL: " . mysqli_connect_error();
}

$numOfCustomers = mysql_query("select count(*) from customers;");
mysqli_query($con, "INSERT INTO customers(userID, fname, lname, email, password, phone, address, city, state, zip, mailingList)
values ('$numOfCustomers','$_POST[fName]','$_POST[lName]','$_POST[email]','$_POST[password]','$_POST[telephone]','$_POST[address]','$_POST[city]', '$_POST[zip]', '$_POST[mailList]')";

if(!mysqli_query($con,$sql)) {
	die('Error: ' .mysqli_error($con));
}

mysqli_close($con);
?>