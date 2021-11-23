<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

$sql = "SELECT * FROM `unit` ";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<option value=" . $row['id'] . ">". $row['unit_name'] . "</option>";
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
