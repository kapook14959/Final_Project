<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <h1 style="margin-left: 10%;">การแจ้งซ่อม</h1>
</div>