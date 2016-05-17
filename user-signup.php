<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/14/2016
 * Time: 9:16 AM
 *
 */

include "connect.php";
include "header.php";

echo "<h3>Sign Up!</h3>";

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo '<form method="post" action="">
        Username:  <input type="text" name="user_name" />
        Password: <input type="password" name="user_password" />
        Password Again: <input type="password" name="user_password_check" />
        Email: <input type="email" name="user_email" />
        First name: <input type="text" name="user_firstname" />
        Last name: <input type="text" name="user_lastname" />
        <input type="submit" value="Sign me up!" />
    </form>';
} else {
    $errors = array();

    if(isset($_POST['user_name'])) {
        if(!ctype_alnum($_POST['user_name'])) {
            $errors[] = 'The Username can only contain characters and numbers';
        }
        if(strlen($_POST['user_name']) > 30) {
            $errors[] = 'The Username cannot be longer than 30 characters.';
        }
    } else {
        $errors[] = 'The Username field must not be empty.';
    }

    if(isset($_POST['user_password'])) {
        if($_POST['user_password'] != $_POST['user_password_check']) {
            $errors[] = 'The two passwords must match!';
        }
    } else {
        $errors[] = 'You must provide a password!';
    }

    if(!empty($errors)) {
        echo 'Well shoot...It looks like there are some errors that need fixed.';
        echo '<div id="error-box"><ul>';
        foreach($errors as $key=>$value) {
            echo '<li>' .  $value . '</li>';
        }
        echo '</ul></div>';
        echo '<a href="user-signup.php">Try again.</a>';
    } else {
        $sql_query = "INSERT INTO
                        users(user_name, user_email, user_firstname, user_lastname, user_password, user_readonly, user_admin, user_date)
                      VALUES('" . mysqli_real_escape_string($link, $_POST['user_name']) . "',
                            '" . mysqli_real_escape_string($link, $_POST['user_email']) . "',
                            '" . mysqli_real_escape_string($link, $_POST['user_firstname']) . "',
                            '" . mysqli_real_escape_string($link, $_POST['user_lastname']) . "',
                            '" . password_hash($_POST['user_password'], PASSWORD_DEFAULT) . "',
                            0, 0, NOW())";

        $result = mysqli_query($link, $sql_query);
        if(!$result) {
            echo "There was a problem with the sign up process. Please try again later. Thank you!";
            echo mysqli_error($link);
            echo "You may click <a href='user-signup.php'>HERE</a> to try again.";
        } else {
            echo "You have registered successfully! You can now <a href='user-signin.php'>SIGN IN!</a>and begin posting to the forum.";
        }
    }
}

include "footer.php";

