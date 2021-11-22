<?php
session_start();
include '../../assets/db/connect.php';
$conn = $_SESSION['conn'];

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $uname = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fisrtname'];
    $lname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $permission = $_POST['permission'];
    $department_id = $_POST['department_id'];

    $sql = "UPDATE `staffs` SET `username`= '$uname', `password`= '$password', `staff_firstname`= '$fname', `staff_lastname`= '$lname', `permission`= '$permission', `telephone`= '$telephone',`email`= '$email',`department_id`= '$department_id' WHERE `id`= '$id'";


if (mysqli_query($conn, $sql)) {
  echo $sql;
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/user-management/user-management.php");
mysqli_close($conn);
