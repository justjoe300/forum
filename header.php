<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/11/2016
 * Time: 6:53 PM
 *
 */

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=UTF-8" />
    <meta name="description" content="Forum by Joseph Gage." />
    <meta name="keywords" content="forum, discussion, joseph gage, web, development" />
    <title>Forum built in PHP and MySQL</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>Forum built by Joseph Gage with PHP and MySQL. </h1>
<div id="wrapper">
    <div id="nav-menu">
        <a href="index.php">Home</a>
        <a href="create-category.php">Create Category</a>
        <a href="create-topic.php">Create Topic</a>
        <div id="userbar">
        <?php
        if(isset($_SESSION['signed_in'])) {
            $signedin = $_SESSION['signed_in'];
            if($signedin == 1) {
                echo 'Hello ' . $_SESSION['user_name'] . '. Not you? <a href="user-signout.php">Sign out</a>';
            }
        } else {
            echo '<a href="user-signin.php">Sign in</a> or <a href="user-signup.php">create an account</a>.';
        }

        ?>
        </div>
    </div>
    <hr />
    <div id="page-content">
