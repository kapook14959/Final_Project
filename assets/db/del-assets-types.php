<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];
if(isset($_GET['id'])){
    $sql = "DELETE FROM `assets_types` WHERE id=".$_GET['id'];
    $res = mysqli_query($conn,$sql);
    header("location:/Final_project/views/assets-types/assets-types.php");

}
mysqli_close($conn);
?>