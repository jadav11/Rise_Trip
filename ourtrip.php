<?php

include ('dbconnect.php');

$link = mysqli_connect("localhost", "root", "", "trip");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql = 'SELECT * FROM trip_list ';

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>t_id</th>";
        echo "<th>t_name</th>";

        echo "<th>t_start_date</th>";
        echo "<th>t_end_date</th>";
        echo "<th>t_image</th>";
        
        ECHO "<th>t_creator_id</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['t_id'] . "</td>";
            echo "<td>" . $row['t_name'] . "</td>";
            echo "<td>" . $row['t_start_date'] . "</td>";
            echo "<td>" . $row['t_end_date'] . "</td>";
            echo "<td>" . $row['t_image'] . "</td>";
            echo "<td>" . $row['t_creator_id'] . "</td>";
            /* echo "<td>" . $row[''] . "</td>"; */
            echo "</tr>";
        }
        echo "</table>";

        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);


