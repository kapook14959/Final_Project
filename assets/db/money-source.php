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

$sql = "SELECT * FROM `money_source`";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['money_source_name']."</td>";
    echo "<td><a class='btn' href='../../views/edit-money-source/edit-money-source.php?id=" . $row['id'] . "'> <i class='bi bi-pencil-square'></i></a>" . "</td>";
    echo "</tr>";
}