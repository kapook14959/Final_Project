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
$sql = "SELECT s.*,d.department_name FROM `staffs` as `s` JOIN `department` as `d` ON s.department_id = d.id";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['staff_firstname'] . "</td>";
            echo "<td>" . $row['staff_lastname'] . "</td>";
            echo "<td>" . $row['department_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telephone'] . "</td>";
            echo "<td>" . $row['permission'] . "</td>";
            echo "<td>" . "<a class='btn'> <i class='bi bi-pencil-square'></i></a>" . "</td>";
            echo "</tr>";
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