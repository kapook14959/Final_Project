<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $sql = "SELECT * FROM `staffs` WHERE `username` = '$user' AND `password` = '$pass'";
    $result = mysqli_query($conn,$sql);
    $res = mysqli_fetch_assoc($result);
    if(!empty($res['username'])){
        $_SESSION['username'] = $res['username'];
        $_SESSION['status'] = $res['permission'];
        sleep(3);
        header('location:/final_project/views/layout/masterpage.php');
    }
    else{
        sleep(3);
        header('location:/final_project/');
    }
    
}