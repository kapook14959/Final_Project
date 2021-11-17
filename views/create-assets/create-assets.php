<?php
include('../layout/masterpage.php');
if(empty($_SESSION['username'])){
    header('location:/final_project/');
}
?>
<div class="container-fluid">
    <form action="../../assets/db/insertassets.php" method="post" enctype="multipart/form-data">
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="id" class="form-control" placeholder="เลขครุภัณฑ์">
        </div>
        <div class="col-md-6">
            <input type="text" name="year_of_budget" class="form-control" placeholder="ปีงบประมาณ">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="name" class="form-control" placeholder="ชื่อครุภัณฑ์">
        </div>
        <div class="col-md-6">
            <input type="text" name="detail" class="form-control" placeholder="รายละเอียด">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="date" name="date_admit" class="form-control" placeholder="วันที่เข้ารับ">
        </div>
        <div class="col-md-6">
            <input type="text" name="value_assets" class="form-control" placeholder="มูลค่าครุภัณฑ์">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="delivery_number" class="form-control" placeholder="เลขที่ใบส่งของ">
        </div>
        <div class="col-md-6">
            <input type="text" name="seller" class="form-control" placeholder="ผู้ขาย">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="serial_number" class="form-control" placeholder="หมายเลขซีเรียล">
        </div>
        <div class="col-md-6">
            <input type="date" name="expiration_date" class="form-control" placeholder="วันหมดประกัน">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" name="status" class="form-control" placeholder="สถานะ">
        </div>
        <div class="col-md-6">
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
                <input type="file" class="form-control-file" name="image">
            </div>
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-3">
            <select class='form-select' name='department_id'>
                <option selected>เลือก สาขา </option>";
                <?php
                    include('../../assets/db/showdepartment.php');
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" name="money_source_id">
                <option selected>เลือก แหล่งที่มาของเงิน </option>
                <?php
                include('../../assets/db/showmoney_source.php');
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select" name="assets_types_id">
                <option selected>เลือก ประเภท </option>
                <?php
                include('../../assets/db/showasset_types.php');
                ?>
            </select>
        </div>
        <div class="col-md-3">
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
        <input type="reset" value="reset" class="btn btn-danger">
        </div>
        </form>
    </div>
</div>