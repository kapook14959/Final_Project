<?php
session_start();
include '../../assets/db/connect.php';
$conn = $_SESSION['conn'];

if(isset($_POST['submit'])){
    $name = $_POST['unitname'];
    $sql = "INSERT INTO `unit`(`unit_name`) VALUES ('$name')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/unit/unit.php");
mysqli_close($conn);