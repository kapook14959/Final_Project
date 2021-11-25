<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];
if(isset($_GET['id'])){
    $sql = "DELETE FROM `unit` WHERE id=".$_GET['id'];
    $res = mysqli_query($conn,$sql);
    header("location:/Final_project/views/unit/unit.php");

}
mysqli_close($conn);
?>