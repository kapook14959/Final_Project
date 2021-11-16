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
