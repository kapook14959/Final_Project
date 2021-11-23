<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

$sql = "SELECT * FROM `department`";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['department_name']."</td>";
    echo "<td><a class='btn' href='../../views/edit-department/edit-department.php?id=" . $row['id'] . "'> <i class='bi bi-pencil-square'></i></a>" . "</td>";
    echo "</tr>";
}