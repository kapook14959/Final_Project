<?php
include('../layout/masterpage.php');
?>
<div class="container-fluid">
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="รหัสครุภัณฑ์">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ปีงบประมาณ">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="เลขครุภัณฑ์">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ชื่อครุภัณฑ์">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="รายละเอียด">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="วันที่รับเข้าคลัง">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="มูลค่าครุภัณฑ์">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ผู้นำเข้าคลัง">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ผู้ขาย">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="หมายเลขซีเรียล">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="รหัสสินทรัพย์">
        </div>
        <div class="col-md-6">
            <input type="text" id="usernameForUser" class="form-control" placeholder="ที่อยู่">
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlFile1">QR-CODE</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlFile1">รูปภาพ</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
        <div class="col-md-3">
            <select class="form-select">
                <option selected>เลือก ภาควิชา </option>
                <option value="1">สำนักงานคณบดีคณะอุตสาหกรรมเกษตร</option>
                <option value="2">ภาควิชาเทคโนโลยีอุตสาหกรรมเกษตรและการจัดการ</option>
                <option value="3">ภาควิชานวัตกรรมและเทคโนโลยีการพัฒนาผลิตภัณฑ์</option>
                <option value="4">ศูนย์วิจัยอุตสาหกรรมเกษตร</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option selected>เลือก แหล่งที่มาของเงิน </option>
                <option value="1">เงินงบประมาณแผ่นดิน-เงินจัดสรร</option>
                <option value="2">เงินจัดสรรให้หน่วยงาน</option>
                <option value="3">เงินอื่นๆ (หน่วยงาน)</option>
                <option value="4">เงินเหลือจ่าย (หน่วยงาน)</option>
                <option value="5">เงินเหลือจ่าย-เงินจัดสรรให้หน่วยงาน (หน่วยงาน)</option>
                <option value="6">เงินจัดสรรโครงการพัฒนาสถาบันฯ</option>
                <option value="7">เงินจัดสรรพัฒนาวิชาการ 10%</option>
                <option value="8">เงินอื่นๆ (บริหารส่วนกลาง)</option>
                <option value="9">เงินเหลือจ่าย - เงินจัดสรรให้บริการส่วนกลาง (บริหารส่วนกลาง)</option>
                <option value="10">เงินเหลือจ่าย - เงินจัดสรรโครงการพัฒนาสถาบันฯ</option>
                <option value="11">เงินเหลือจ่าย - เงินรับสมัครนักศึกษาใหม่ (บริหารส่วนกลาง)</option>
                <option value="12">เงินงบประมาณแผ่นดิน-เงินกันเหลื่อม</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option selected>เลือก ประเภท </option>
                <option value="1">ครุภัณฑ์ไฟฟ้าและวิทยุ</option>
                <option value="2">ครุภัณฑ์สำนักงาน</option>
                <option value="3">ครุภัณฑ์คอมพิวเตอร์</option>
                <option value="4">ครุภัณฑ์โฆษณาและเผยแพร่</option>
                <option value="5">ครุภัณฑ์การศึกษา</option>
                <option value="6">ครุภัณฑ์วิทยาศาสตร์และการแพทย์</option>
                <option value="7">ครุภัณฑ์งานบ้านงานครัว</option>
                <option value="8">โปรแกรมคอมพิวเตอร์ (ครุภัณฑ์)</option>
                <option value="9">ครุภัณฑ์ยานพาหนะและขนส่ง</option>
                <option value="10">ครุภัณฑ์โรงงาน</option>
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-select">
                <option selected>เลือก หน่วยนับ </option>
                <option value="1">ระบบ</option>
                <option value="2">ผืน</option>
                <option value="3">เครื่อง</option>
                <option value="4">ชุด</option>
                <option value="5">ตัว</option>
                <option value="6">กล้อง</option>
                <option value="7">ตู้</option>
                <option value="8">ที่</option>
                <option value="9">อัน</option>
                <option value="10">คัน</option>
                <option value="11">งาน</option>
            </select>
        </div>
    </div>
    <div class="row" style="margin: 10px 0 10px 38rem; width:50%;">
        <div class="col">
            <a class="btn btn-danger btn-back">กลับ</a>
        </div>
        <div class="col">
            <a class="btn btn-primary btn-save">บันทึก</a>
        </div>

    </div>
</div>