<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">สร้างข้อมูลครุภัณฑ์</h1>
    <form action="../../assets/db/insertassets.php" method="post" enctype="multipart/form-data">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>เลขครุภัณฑ์</label>
                <input type="text" name="id" class="form-control" placeholder="เลขครุภัณฑ์">
            </div>
            <div class="col-md-6">
                <label>ปีงบประมาณ</label>
                <input type="text" name="year_of_budget" class="form-control" placeholder="ปีงบประมาณ">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>ชื่อครุภัณฑ์</label>
                <input type="text" name="name" class="form-control" placeholder="ชื่อครุภัณฑ์">
            </div>
            <div class="col-md-6">
                <label>รายละเอียด</label>
                <input type="text" name="detail" class="form-control" placeholder="รายละเอียด">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>วันที่เข้ารับ</label>
                <input type="date" name="date_admit" class="form-control" placeholder="วันที่เข้ารับ">
            </div>
            <div class="col-md-6">
                <label>มูลค่าครุภัณฑ์</label>
                <input type="text" name="value_assets" class="form-control" placeholder="มูลค่าครุภัณฑ์">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>เลขที่ใบส่งของ</label>
                <input type="text" name="delivery_number" class="form-control" placeholder="เลขที่ใบส่งของ">
            </div>
            <div class="col-md-6">
                <label>ผู้ขาย</label>
                <input type="text" name="seller" class="form-control" placeholder="ผู้ขาย">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>หมายเลขซีเรียล</label>
                <input type="text" name="serial_number" class="form-control" placeholder="หมายเลขซีเรียล">
            </div>
            <div class="col-md-6">
                <label>วันหมดประกัน</label>
                <input type="date" name="expiration_date" class="form-control" placeholder="วันหมดประกัน">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>สถานะ</label>
                <select class='form-select' name='status'>
                    <option selected>เลือก สถานะ </option>
                    <option>อยู่ในคลัง </option>
                    <option>ถูกยืม</option>
                    <option>อยู่ระหว่างซ่อม</option>
                    <option>จำหน่าย</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>ที่อยู่</label>
                <input type="text" name="address" class="form-control" placeholder="ที่อยู่">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlFile1">QR-CODE</label>
                    <input type="file" class="form-control-file" name="qr_code">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlFile1">รูปภาพ</label>
                    <input type="file" class="form-control-file" name="image" onchange="readURL(this);">
                    <img id="preview" src=" " width="50px" height="auto">
                </div>
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-3">
                <label>หน่วยงาน</label>
                <select class='form-select' name='department_id'>
                    <option selected>เลือก หน่วยงาน </option>";
                    <?php
                    include('../../assets/db/showdepartment.php');
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>แหล่งที่มาของเงิน</label>
                <select class="form-select" name="money_source_id">
                    <option selected>เลือก แหล่งที่มาของเงิน </option>
                    <?php
                    include('../../assets/db/showmoney_source.php');
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>ประเภท</label>
                <select class="form-select" name="assets_types_id">
                    <option selected>เลือก ประเภท </option>
                    <?php
                    include('../../assets/db/showasset_types.php');
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <label>หน่วยนับ</label>
                <select class="form-select" name="unit_id">
                    <option selected>เลือก หน่วยนับ </option>
                    <?php
                    include('../../assets/db/showunit.php');
                    ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 38rem; width:50%;">
            <div class="col" style="margin-left: 42%;">
                <input type="submit" value="บันทึก" name="submit" class="btn btn-success">
            </div>
            <div class="col" style="margin-right: 37%;">
                <a class="btn btn-danger" onclick="GoBack(true)"> <span>กลับ</span> </a>
            </div>
    </form>
</div>
</div>