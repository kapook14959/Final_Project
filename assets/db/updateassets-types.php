<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['typesname'];
    $sql = "UPDATE `assets_types` SET `assets_types_name`='$name' WHERE `id` = '$id'";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/assets-types/assets-types.php");
mysqli_close($conn);