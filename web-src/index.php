<?php
require_once('global.php');

//if the login form is submitted, process the login
if (isset($_POST['email']) && $_POST['action'] == "login") {
    if (empty($_POST['email'])) {
        $login_errors[] = 'Email was left empty';
    }
    if (empty($_POST['password'])) {
        $login_errors[] = 'Password was left empty';
    }

    if (!isset($errors)) {
        $result = mysql_query('select *
			from customers
			where email = "' . $_POST['email'] . '" and password="' . $_POST['password'] . '"') or die(mysql_error());

        if (mysql_num_rows($result) < 1) {
            $login_errors[] = "Invalid login";
        } else {
            $_SESSION['userdata'] = mysql_fetch_assoc($result);
            $_SESSION['logged_in'] = true;
            header('Location: order.php');
        }
    }
}


//process registration here
if (isset($_POST['firstname']) && $_POST['action'] == "register") {
    if (empty($_POST['firstname']))
        $reg_error[] = 'First name was left empty';
    if (empty($_POST['lastname']))
        $reg_error[] = 'last name was left empty';
    if (empty($_POST['email']))
        $reg_error[] = 'email was left empty';
    if (empty($_POST['password']))
        $reg_error[] = 'password cannot be empty';
    if (empty($_POST['telephone']))
        $reg_error[] = 'telephone cannot be empty';
    if (empty($_POST['address']))
        $reg_error[] = 'address cannot be empty';
    if (empty($_POST['city']))
        $reg_error[] = 'city cannot be empty';
    if (empty($_POST['state']))
        $reg_error[] = 'state can not be empty';
    if (empty($_POST['zip']))
        $reg_error[] = 'zip cannot be empty';

    if (!isset($reg_error)) {
        mysql_query('INSERT INTO customers(fname,lname,email,password,phone,address,city,state,zip,mailingList) 
            values("' . mysql_real_escape_string($_POST['firstname']) . '","' . mysql_real_escape_string($_POST['lastname'])
                        . '","' . mysql_real_escape_string($_POST['email']) .
                        '","' . mysql_real_escape_string($_POST['password']) . '","' . mysql_real_escape_string($_POST['telephone'])
                        . '","' . mysql_real_escape_string($_POST['address']) . '","' . mysql_real_escape_string($_POST['city']) . '","' .
                        mysql_real_escape_string($_POST['state']) . '","' . mysql_real_escape_string($_POST['zip']) . '","' .
                        mysql_real_escape_string($_POST['mailing_list']) . '")') or die(mysql_error());
        echo "account created";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <meta charset=UTF-8>
        <title>Custom Cupcakes</title>
    </head>
    <body>
        <h1>Welcome to Custom Cupcakes!</h1>
        <div id="logo">
            <img src="images/cupcake_icon.png" alt="Custom Cupcake Logo" height=25% width=25% />
            <p>Great Flavors!</p>
            <p>Awesome Cupcakes</p>
            <p>Fast Delivery!</p>
        </div>
        <div id="returningUser">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <h3>Log In</h3>
<?php if (isset($login_errors)): ?><div style="color:red"><?php echo $login_errors[0]; ?></div><?php endif; ?>
                <table>

                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td><input type="password" name="password" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="action" value="login" /><input type="submit" value="Log In"/></td>
                    </tr>

                </table>
            </form>
        </div>
        <div id="newUser">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">    
                <h3>Sign Up</h3>
                <?php if (isset($reg_error)): ?><div style="color:red"><?php foreach($reg_error as $err){echo '<li>',$err,'</li>';} ?></div><?php endif; ?>
                <table>

                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="firstname" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lastname" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="email" name="email" value="" maxlength="30"/></td>

                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>Telephone Number:</td>
                        <td><input type="tel" name="telephone" value="" maxlength="11"/></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><input type="text" name="address" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>City:</td>
                        <td><input type="text" name="city" value="" maxlength="30"/></td>
                    </tr>
                    <tr>
                        <td>State:</td>
                        <td><select name="state">
                                <option>AL</option><option>AK</option><option>AZ</option><option>AR</option>
                                <option>CA</option><option>CO</option><option>CT</option><option>DE</option>
                                <option>FL</option><option>GA</option><option>HI</option><option>ID</option>
                                <option>IL</option><option>IN</option><option>IA</option><option>KS</option>
                                <option>KY</option><option>LA</option><option>ME</option><option>MD</option>
                                <option>MA</option><option>MI</option><option>MN</option><option>MS</option>
                                <option>MO</option><option>MT</option><option>NE</option><option>NV</option>
                                <option>NH</option><option>NJ</option><option>NM</option><option>NY</option>
                                <option>NC</option><option>ND</option><option>OH</option><option>OK</option>
                                <option>OR</option><option>PA</option><option>RI</option><option>SC</option>
                                <option>SD</option><option>TN</option><option>TX</option><option>UT</option>
                                <option>VT</option><option>VA</option><option>WA</option><option>WV</option>
                                <option>WI</option><option>WY</option></select></td>
                    </tr>
                    <tr>
                        <td>Zipcode:</td>
                        <td><input type="text" name="zip" value="" maxlength="5" /></td>
                    </tr>
                    <tr>
                        <td>Join Our Mailing List:</td>
                        <td><input type="radio" name="mailing_list" value="true">Yes<input type="radio" name="mailing_list" value="false">No</td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="action" value="register" /><input type="submit" value="Create Account"/></td>
                    </tr>

                </table></form>
        </div>
    </body>
    <footer>
        <div>View analytics <a href="analytics.php">here.</a></div>
    </footer>
</html>
