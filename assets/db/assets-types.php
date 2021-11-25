<?php
session_start();
include '../../assets/db/connect.php';
$conn =  $_SESSION['conn'];

$sql = "SELECT * FROM `assets_types`";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res)){
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['assets_types_name']."</td>";
    echo "<td><a class='btn' href='../../views/edit-assets-types/edit-assets-types.php?id=" . $row['id'] . "'> <i class='bi bi-pencil-square'></i></a>" . "</td>";
    echo "<td><a class='btn' href='../../assets/db/del-assets-types.php?id=" . $row['id'] . "'> <i class='bi bi-trash'></i></a>" . "</td>";
    echo "</tr>";
}