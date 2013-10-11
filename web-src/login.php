<?php

/*
 * Allows users to log in.
 */

require_once('global.php');

if (isset($_GET['email'])) {
    if (empty($_GET['email'])) {
        $errors[] = 'Email was left empty';
    }
    if (empty($_GET['password'])) {
        $errors[] = 'Password was left empty';
    }
}
if (!isset($errors)) {
    $result = mysql_query('select *
			from customers
			where email = "' . $_POST['email'] . '" and password="' . $_POST['password'] . '"') or die(mysql_error());

    if (mysql_num_rows($result) < 1) {
        echo 'Invalid login';
        exit;
    } else {
        $_SESSION['userdata'] = mysql_fetch_assoc($result);
        $_SESSION['logged_in'] = true;
        header('Location: order.php');
    }
}
?>