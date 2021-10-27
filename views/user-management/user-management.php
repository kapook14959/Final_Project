<?php
include('../layout/masterpage.php');
?>
<style>
    <?php
    include('../../assets/css/user-management.css');
    ?>
</style>
<div class="container-fluid">
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
        include '../../assets/db/connect.php';
        ?>
    </table>

</div>