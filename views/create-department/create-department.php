<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">สร้างข้อมูลหน่วยงาน</h1>
    <form action="../../assets/db/insertdepartment.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <input type="text" class="form-control" name="depname" placeholder="กรอกหน่วยงาน">
        </div>
        <div class="row" style="margin: 10px 0 10px 60rem; width:50%;">
            <div class="col">
                <input type="submit" class="btn btn-success" name="submit">
                <a class="btn btn-danger" onclick="GoBack(true)"> <span>กลับ</span> </a>
            </div>
            <!-- <div class="col">
                <a class="btn btn-danger" onclick="GoBack(true)"> <span>กลับ</span> </a>
            </div> -->
        </div>
    </form>
</div>