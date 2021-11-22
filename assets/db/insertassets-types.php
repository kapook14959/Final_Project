<?php
session_start();
include '../../assets/db/connect.php';
$conn = $_SESSION['conn'];

if(isset($_POST['submit'])){
    $name = $_POST['typesname'];
    $sql = "INSERT INTO `assets_types`(`assets_types_name`) VALUES ('$name')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/assets-types/assets-types.php");
mysqli_close($conn);