<?php
/**
 * 01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789
 * Created by Joseph Gage.
 * Date: 5/16/2016
 * Time: 3:48 PM
 *
 */

include 'connect.php';
include 'header.php';

//first select the topics.
$sql = "SELECT
          topic_id,
          topic_subject
        FROM
          topics
        WHERE
          topics.topic_id = " . mysqli_real_escape_string($link, $_GET['id']);

$result = mysqli_query($link, $sql);

if(!$result) {
    echo 'The topic could not be displayed, please try again later.' . mysqli_error($link);
} else {
    if(mysqli_num_rows($result) == 0) {
        echo 'This topic does not exist.';
    } else {
        //display topic table header
        //prepare the table
        while($row = mysqli_fetch_assoc($result)) {
            echo '<table border="1">
                      <tr>
                        <th colspan="2">' . $row['topic_subject'] .'</th>
                      </tr>';
        }


        //do a query for the topics
    $sql2 = "SELECT
    posts.post_topic,
    posts.post_content,
    posts.post_date,
    posts.post_by,
    users.user_id,
    users.user_name
FROM
    posts
LEFT JOIN
    users
ON
    posts.post_by = users.user_id
WHERE
    posts.post_topic = " . mysqli_real_escape_string($link, $_GET['id']);

        $result = mysqli_query($link, $sql2);

        if(!$result) {
            echo 'The topics could not be displayed, please try again later.';
        } else {
            if(mysqli_num_rows($result) == 0) {
                echo '<tr><td>There are no topics to show.</td></tr>';
            } else {
                while($row = mysqli_fetch_assoc($result)) {
                    print_r($row);
                    echo '<tr>';
                    echo '<td class="leftpart">';
                    echo '<h3>' . $row['user_name'] . ' on ' . $row['post_date'] . '<h3>';
                    echo '</td>';
                    echo '<td class="rightpart">';
                    echo $row['post_content'];
                    echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}

include 'footer.php';
?>