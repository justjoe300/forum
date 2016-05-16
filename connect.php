<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/11/2016
 * Time: 9:56 PM
 *
 * This is the file that makes my database connection for MySQL.
 *
 *
 *
 */


$server = 'localhost';
$username   = 'joseph';
$password   = 'andy6337';
$database   = 'forum_data';

if(!mysqli_connect($server, $username,  $password, $database))
{
    exit('Error: could not establish database connection');
} else {
    echo "For testing purposes I am notifying you that the connection is successful.";
}
?>

