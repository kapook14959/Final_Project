<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

if(isset($_POST['submit'])){
    $name = $_POST['sourcename'];
    $sql = "INSERT INTO `money_source`(`money_source_name`) VALUES ('$name')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/money-source/money-source.php");
mysqli_close($conn);