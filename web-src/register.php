<?php
/*
 * Allow users to register for an account
 */

require_once('global.php');

//process registration here
if (isset($_POST['firstname'])) {
    if (empty($_POST['firstname']))
        $error[] = 'First name was left empty';
    if (empty($_POST['lastname']))
        $error[] = 'last name was left empty';
    if (empty($_POST['email']))
        $error[] = 'email was left empty';
    if (empty($_POST['password'])) 
        $error[] = 'password cannot be empty';
    if (empty($_POST['telephone']))
        $error[] = 'telephone cannot be empty';
    if (empty($_POST['address']))
        $error[] = 'address cannot be empty';
    if (empty($_POST['city']))
        $error[] = 'city cannot be empty'; 
    if (empty($_POST['state']))
        $error[] =  'state can not be empty';
    if (empty($_POST['zip']))
        $error[] = 'zip cannot be empty';

    if (!isset($errors)) {
        mysql_query('INSERT INTO customers(fname,lname,email,password,phone,address,city,state,zip,mailingList) 
            values("' . mysql_real_escape_string($_POST['firstname']) . '","' . mysql_real_escape_string($_POST['lastname']) 
                . '","' . mysql_real_escape_string($_POST['email']) . 
                 '","' . mysql_real_escape_string($_POST['password']) . '","' . mysql_real_escape_string($_POST['telephone'])
                 . '","'.  mysql_real_escape_string($_POST['address']) . '","' . mysql_real_escape_string($_POST['city']) . '","' .
                  mysql_real_escape_string($_POST['state']) . '","' .  mysql_real_escape_string($_POST['zip']) .'","'.
                   mysql_real_escape_string($_POST['mailing_list']). '")') 
        or die(mysql_error());
        echo "account created";
    }
}
?>
<!--registration form here -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        Login to the system
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            First Name: <input type="text" name="firstname" /><br />
            Last Name: <input type="text" name="lastname" /><br />
            Email: <input type="text" name="email" /><br />
            Password: <input type="text" name="password"/><br />
            Telephone: <input type="text" name="telephone"/><br />
            Address: <input type="text" name="address" /><br />
            City: <input type="text" name="city" /><br />
            State: <input type="text" name="state" /> <br />
            Zip Code: <input type="text" name= "zip" ><br />
            Check to be on our mailing list: <input type="hidden" name="mailing_list" value = "false" /><input type="checkbox" name="mailing_list" value="true" />

            </select><br />
            <input type="submit" value="Register" />
        </form>
    </body>
</html>
