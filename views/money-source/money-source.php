<?php
include('../layout/masterpage.php');
if(empty($_SESSION['username'])){
    header('location:/final_project/');
}
?>
<div class="container-fluid">
<a class="button-17" href="../../views/create-money-source/create-money-source.php">เพิ่มแหล่งเงิน</a>
    <table style="margin-left: 33%; width:50%;">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>แก้ไข</th>
        </tr>
        <?php
        include '../../assets/db/money-source.php';
        ?>
    </table>
</div>