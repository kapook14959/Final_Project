<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "12345678";
$dbname = "assetsmanagement";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `department`";

if ($result = mysqli_query($conn, $sql)) {

    if (mysqli_num_rows($result) > 0) {

        echo"<select class='form-select' name='department_id'>
        <option selected>เลือก สาขา </option>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<option value=".$row['id'].">" . $row['department_name'] . "</option>";
        }

        echo"</select>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);