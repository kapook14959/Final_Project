<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<style>
    <?php
    include('../../assets/css/user-management.css');
    ?>
</style>
<div class="container-fluid">
    <h1 style="margin-left:10%;">แสดงข้อมูลผู้ใช้งาน</h1>
    <a class="button-17" onclick="CreateUser(true);">เพิ่มเจ้าหน้าที่</a>
    <table style="margin-left: 40%;">
        <tr>
            <th>รหัสเจ้าหน้าที่</th>
            <th>ชื่อผู้ใช้</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>ภาควิชา</th>
            <th>เบอร์โทร</th>
            <th>อีเมล์</th>
            <th>สิทธิ์การใช้งาน</th>
            <th>แก้ไขข้อมูล</th>
        </tr>
        <?php
        include '../../assets/db/showuser.php';
        ?>
    </table>

</div>