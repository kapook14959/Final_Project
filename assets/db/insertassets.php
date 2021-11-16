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
    $year_of_budget = $_POST['year_of_budget'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $date_admit = $_POST['date_admit'];
    $value_assets = $_POST['value_assets'];
    $delivery_number = $_POST['delivery_number'];
    $seller = $_POST['seller'];
    $serial_number = $_POST['serial_number'];
    $expiration_date = $_POST['expiration_date'];
    $status = $_POST['status'];
    $department_id = $_POST['department_id'];
    $money_source_id = $_POST['money_source_id'];
    $assets_types_id = $_POST['assets_types_id'];
    $unit_id = $_POST['unit_id'];

    $sql = "INSERT INTO `assets`(`id`, `asset_name`, `detail`, `year_of_budget`, `value_asset`, `seller_name`, `status`, `number_delivery`, `serial_number`, `date_admit`, `expiration_date`, `asset_type_id`, `unit_id`, `department_id`, `money_source_id`) 
    VALUES ('$id','$name','$detail','$year_of_budget','$value_assets','$seller','$status','$delivery_number','$serial_number','$date_admit','$expiration_date','$assets_types_id','$unit_id','$department_id','$money_source_id')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}

header("location:/Final_project/views/detail-assets/detail-assets.php");
mysqli_close($conn);
