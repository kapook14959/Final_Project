<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fisrtname'];
    $lname = $_POST['lastname'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $permission = $_POST['permission'];
    $department_id = $_POST['department_id'];

    $sql = "INSERT INTO `staffs`(`username`, `password`, `staff_firstname`, `staff_lastname`, `permission`, `telephone`, `email`, `department_id`) VALUES ('$username','$password','$fname','$lname','$permission','$telephone','$email','$department_id')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/user-management/user-management.php");
mysqli_close($conn);
