<?php
include('../layout/masterpage.php');
if(empty($_SESSION['username'])){
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <form action="../../assets/db/insertmoney-source.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="text" class="form-control" name="sourcename" placeholder="กรอกแหล่งเงิน">
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="submit" class="btn btn-success" name="submit">
        </div>
    </form>
</div>