<?php
include('../layout/masterpage.php');
?>
<div class="container">
    <div class="row" style="margin: 10px 0 10px 0;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ชื่อผู้ใช้งาน">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="รหัสผ่าน">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 0;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ชื่อ">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="นามสกุล">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 0;">
        <div class="col">
            <select class="form-select">
                <option selected>เลือก Role </option>
                <option value="1">Staff</option>
                <option value="2">Admin</option>
                <option value="3">Executive</option>
            </select>
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 0;">
        <div class="col">
            <a class="btn btn-danger btn-back">กลับ</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-save">บันทึก</a>
        </div>

    </div>
</div>