<?php
session_start();
include '../../assets/db/connect.php';
$conn = $_SESSION['conn'];

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['depname'];
    $sql = "UPDATE `department` SET `department_name`='$name' WHERE `id` = '$id'";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/department/department.php");
mysqli_close($conn);