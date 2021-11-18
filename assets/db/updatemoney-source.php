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
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['sourcename'];
    $sql = "UPDATE `money_source` SET `money_source_name`='$name' WHERE `id` = '$id'";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/money-source/money-source.php");
mysqli_close($conn);