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
$username   = 'root';
$password   = '';
$database   = 'forum_data';

$link = mysqli_connect($server, $username,  $password, $database);

if(!$link)
{
    exit('Error: could not establish database connection');
}
?>
