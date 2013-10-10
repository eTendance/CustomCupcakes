<?php
/*
 * Allows users to log in.
 */

	require_once('global'.php');

	if(isset($_GET['email'])) {
		if (empty($_GET['email'])) {
			$error[] = 'Email was left empty';
		}
		if(empty($_GET['password'])) {
			$error[] = 'Password was left empty';
		}
	}
	if(!isset($errors)) {
		$user = mysql_query('select email
			from customers
			where '$_GET['email']';'
		or die(mysql_error());
		$pass = mysql_query('select password
			from customers
			where '$_GET['email']';'
		or die(mysql_error());
		if(is_null($user)) {
			$error[] = 'User does not exist';
		}
		if($_GET['password'] != $pass) {
			$error[] = 'Incorrect pasword';
		}
		if(!isset($errors) {
			session_start();
			$_SESSION['email'] = $_GET['email'];
			$_SESSION['password'] = $_GET['password'];
			header('Location: customCupcakesOrder.html');
		}
	}
?>