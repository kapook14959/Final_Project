<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
include('../../assets/db/connect.php');
$conn = $_SESSION['conn'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `assets_types` WHERE id =" . $id;
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">แก้ไขข้อมูลประเภทครุภัณฑ์</h1>
    <form action="../../assets/db/updateassets-types.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <label>ชื่อประเภทครุภัณฑ์</label>
            <input type="text" class="form-control" name="typesname" placeholder="กรอกประเภทครุภัณฑ์" value="<?php echo $data['assets_types_name']; ?>">
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col" style="text-align: right;">
                <input type="submit" class="btn btn-success" name="submit">
            </div>
            <div class="col">
                <a class="btn btn-danger" onclick="GoBack(true)"> <span>กลับ</span> </a>
            </div>
        </div>
    </form>
</div>