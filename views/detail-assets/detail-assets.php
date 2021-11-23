<?php
session_start();
include('../layout/masterpage.php');
include('../../assets/db/connect.php');
if(empty($_SESSION['username'])){
    header('location:/final_project/');
}
$conn = $_SESSION['conn'];
?>
<style>
    <?php
    include('../../assets/css/detail-assets.css');
    ?>
</style>
<div class="container-fluid">
    <h1 style="margin-left:10%;">แสดงข้อมูลครุภัณฑ์</h1>
    <form action=" " method="post">
    <input type="text" name="search" style="margin-left:10%;">
    <input type="submit" value="ค้นหา" class="btn btn-primary">
    </form>
    <a class="button-17" onclick="CreateAssets(true);" style="margin-left: 5%">เพิ่มครุภัณฑ์</a>
    <table style="width: 78%;">
        <tr>
            <th>เลขครุภัณฑ์</th>
            <th>หน่วยงาน</th>
            <!-- <th>แหล่งที่มาของเงิน</th> -->
            <th>ปีงบประมาณ</th>
            <th>ชื่อครุภัณฑ์</th>
            <th>รายละเอียด</th>
            <th>หน่วยนับ</th>
            <!-- <th>วันที่รับเข้าคลัง</th> -->
            <!-- <th>มูลค่าครุภัณฑ์</th> -->
            <th>เลขที่ใบส่งของ</th>
            <!-- <th>ผู้ขาย</th> -->
            <th>หมายเลขซีเรียล</th>
            <th>วันหมดประกัน</th>
            <th>ประเภท</th>
            <!-- <th>สถานะ</th>
            <th>ที่อยู่</th> -->
            <th>QR-CODE</th>
            <th>รูปภาพ</th>
            <th>แก้ไข</th>
        </tr>
        <?php
            include('../../assets/db/showassets.php');
        ?>
    </table>
</div>