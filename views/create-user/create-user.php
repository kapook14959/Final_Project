<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">สร้างข้อมูลผู้ใช้งาน</h1>
    <form action="../../assets/db/insertuser.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>ชื่อผู้ใช้งาน</label>
                <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน">
            </div>
            <div class="col-md-6">
                <label>รหัสผ่าน</label>
                <input type="text" name="password" class="form-control" placeholder="รหัสผ่าน">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>ชื่อ</label>
                <input type="text" name="fisrtname" class="form-control" placeholder="ชื่อ">
            </div>
            <div class="col-md-6">
                <label>นามสกุล</label>
                <input type="text" name="lastname" class="form-control" placeholder="นามสกุล">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>เบอร์มือถือ</label>
                <input type="text" name="telephone" class="form-control" placeholder="เบอร์มือถือ">
            </div>
            <div class="col-md-6">
                <label>อีเมล์</label>
                <input type="text" name="email" class="form-control" placeholder="E-Mail">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col">
                <label>สิทธิ์การใช้งาน</label>
                <select class="form-select" name="permission">
                    <option selected>เลือก Role </option>
                    <option value="staff">เจ้าหน้าที่</option>
                    <option value="ceo">ผู้บริหาร</option>
                </select>
            </div>
            <div class="col">
                <label>หน่วยงาน</label>
                <select class='form-select' name='department_id'>
                    <option selected>เลือก หน่วยงาน </option>
                    <?php
                    include('../../assets/db/showdepartment.php');
                    ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 38rem; width:50%;">
            <div class="col" style="margin-left: 42%;">
                <input type="submit" class="btn btn-success" name="submit" value="บันทึก">
            </div>
            <div class="col" style="margin-right: 37%;">
                <a class="btn btn-danger" onclick="GoBack(true)"> <span>กลับ</span> </a>
            </div>
        </div>
    </form>
</div>