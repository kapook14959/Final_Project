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
  $image;

  if(isset($_FILES['image'])){
    $target_dir = "../../assets/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $target_file;
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

}
  }
  $sql = "UPDATE `assets` SET `id`='$id',`asset_name`='$name',`detail`='$detail',`year_of_budget`='$year_of_budget',`value_asset`='$value_assets',`seller_name`='$seller',`status`='$status',`number_delivery`='$delivery_number',`serial_number`='$serial_number',`date_admit`='$date_admit',`expiration_date`='$expiration_date',`assets_types_id`='$assets_types_id',`unit_id`='$unit_id',`department_id`='$department_id',`money_source_id`='$money_source_id',`image` ='$image'  WHERE `id` = '$id'";
  


if (mysqli_query($conn, $sql)) {
  echo $sql;
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
}


header("location:/Final_project/views/detail-assets/detail-assets.php");
mysqli_close($conn);