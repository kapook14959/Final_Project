<?php
session_start();


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
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $sql = "SELECT * FROM `staffs` WHERE `username` = '$user' AND `password` = '$pass'";
    $result = mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($result);
    if(!empty($res['username'])){
        $_SESSION['username'] = $res['username'];
        sleep(5);
        header('location:/final_project/views/layout/masterpage.php');
    }
    else{
        echo "<script>alert('fail')</script>";
        sleep(5);
        header('location:/final_project/');
    }
    
}