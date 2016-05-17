<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/11/2016
 * Time:12:13 pm
 *
 */

include "header.php";
include 'connect.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
        Category name: <input type="text" name="cat_name" /><br />
        Category description:<br /><textarea name="cat_description"" /></textarea>
        <input type="submit" value="Add category" />
     </form>';
} else {
    //the form has been posted, so save it
    $sql_query = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysqli_real_escape_string($link, $_POST['cat_name']) . "', '"
             . mysqli_real_escape_string($link, $_POST['cat_description']) . "')";
    //print_r($sql_query);
    $result = mysqli_query($link, $sql_query);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error:' . mysqli_error($link);
    }
    else
    {
        echo 'New category successfully added.';
    }
}

include 'footer.php';
?>
