<?php
include('../layout/masterpage.php');
if(empty($_SESSION['username'])){
    header('location:/final_project/');
}

$host = "localhost";
$port = "3306";
$username = "root";
$password = "12345678";
$dbname = "assetsmanagement";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `money_source` WHERE id =".$id;
    $result = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($result);

}
?>
<div class="container-fluid">
<form action="../../assets/db/updatemoney-source.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
            <input type="text" class="form-control" name="sourcename" placeholder="กรอกแหล่งเงิน" value="<?php echo $data['money_source_name'];?>">
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="submit" class="btn btn-success" name="submit">
        </div>
    </form>
</div>