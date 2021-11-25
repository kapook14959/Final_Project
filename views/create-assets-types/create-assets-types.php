<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">สร้างข้อมูลประเภทครุภัณฑ์</h1>
    <form action="../../assets/db/insertassets-types.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="text" class="form-control" name="typesname" placeholder="กรอกประเภทครุภัณฑ์">
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col" style="text-align: right;">
            <input type="submit" value="บันทึก" name="submit" class="btn btn-success">
            </div>
            <div class="col">
                <a class="btn btn-danger" onclick="GoBack(true)"> <span>กลับ</span> </a>
            </div>
        </div>
    </form>
</div>