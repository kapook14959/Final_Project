<?php
include('../layout/masterpage.php');
?>
<div class="container-fluid">
    <form action="../../assets/db/insertuser.php" method="post">
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน">
        </div>
        <div class="col-md-6">
            <input type="text" name="password" class="form-control" placeholder="รหัสผ่าน">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="fisrtname" class="form-control" placeholder="ชื่อ">
        </div>
        <div class="col-md-6">
            <input type="text" name="lastname" class="form-control" placeholder="นามสกุล">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="telephone" class="form-control" placeholder="เบอร์มือถือ">
        </div>
        <div class="col-md-6">
            <input type="text" name="email" class="form-control" placeholder="E-Mail">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col">
            <select class="form-select" name="permission">
                <option selected>เลือก Role </option>
                <option value="เจ้าหน้าที่">เจ้าหน้าที่</option>
                <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                <option value="ผู้บริหาร">ผู้บริหาร</option>
            </select>
        </div>
        <div class="col">
                <?php
                include('../../assets/db/showdepartment.php');
                ?>
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 38rem; width:50%;">
    <div class="col">
    <input type="submit" class="btn btn-success" name="submit" value="บันทึก">
    </div>
    <div class="col">
    <input type="reset" class="btn btn-danger" value="reset">
    </div>
    </div>
    </form>
</div>