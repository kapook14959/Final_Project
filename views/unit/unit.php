<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">แสดงข้อมูลหน่วยนับ</h1>
    <a class="button-17" href="../../views/create-unit/create-unit.php">เพิ่มหน่วยนับ</a>
    <table style="margin-left: 33%; width:50%;">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>
        <?php
        include '../../assets/db/unit.php';
        ?>
    </table>
</div>