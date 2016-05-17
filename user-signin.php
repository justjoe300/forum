<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/16/2016
 * Time: 12:00 PM
 *
 */

include 'connect.php';
include 'header.php';

echo '<H2>Sign in Here!</H2>';

//Let's check to see if the user is already signed in. If so, we don't need to try to again.
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true) {
    echo 'You are already signed in. You can <a href="user_signout.php">SIGN OUT</a> if you wish.';
} else {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        //The form hasn't posted yet so we need to display it. We are posting to this page.
        echo '<form method="post" action="">
                Username: <input type="text" name="user_name">
                Password: <input type="password" name="user_password">
                <input type="submit" value="submit">
                </form>';
    } else {
        //Then if the form IS posted, we will process it. First, lets check the data. next we can let the user fix errors, then we can verify again and return the expected response.
        $signin_errors = array();

        if (!isset($_POST['user_name'])) {
            $signin_errors[] = "The Username field must not be empty.";
        }
        if (!isset($_POST['user_password'])) {
            $signin_errors[] = "The Password field must not be empty.";
        }

        if (!empty($signin_errors)) {
            echo 'Well shoot...It looks like there are some errors that need fixed.';
            echo '<ul>';
            foreach ($signin_errors as $key => $value) {
                echo '<li>' . $value . '</li>';
            }
            echo '</ul>';
        } else {
            //If there are no errors we proceed.
            $sql_query = "SELECT
                        user_id,
                        user_name,
                        user_password,
                        user_admin
                    FROM
                        users
                    WHERE
                        user_name = '" . mysqli_real_escape_string($link, $_POST['user_name']) . "'";

            $result = mysqli_query($link, $sql_query);
            //the next line is for debugging. uncomment to debug.
            //echo mysqli_error($link);

            if (!$result) {
                echo "There was a problem with the sign up process. Please try again later. Thank you!";
                echo mysqli_error($link);
                echo "You may click <a href='user-signin.php'>HERE</a> to try again.";
            } else {
                if (mysqli_num_rows($result) == 0) {
                    echo "Your username is wrong. Please click <a href='user-signin.php'> HERE</a> to try again.";
                } else {
                    $check = mysqli_fetch_assoc($result);
                    $checksum = $check['user_password'];
                    if(!password_verify($_POST['user_password'], $checksum)) {
                        echo "Your password is wrong. Please click <a href='user-signin.php'> HERE</a> to try again.";
                    } else {
                        echo "success!!!!!!";
                        //we set the session signed in variable to true, then add the users info to the session.
                        $_SESSION['signed_in'] = true;
                        $myrow = $check;
                            $_SESSION['user_id'] = $myrow['user_id'];
                            $_SESSION['user_name'] = $myrow['user_name'];
                            $_SESSION['user_admin'] = $myrow['user_admin'];

                       print_r($_SESSION);
                        echo session_id();

                        echo 'Welcome, ' . $_SESSION['user_name'] . ' . <a href="index.php">Proceed to the forum Overview!</a>.';
                    }
                }
            }
        }
    }
}
include 'footer.php';


