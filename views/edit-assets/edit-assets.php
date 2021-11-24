<?php
include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
include('../../assets/db/connect.php');
$conn = $_SESSION['conn'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT a.*,t.assets_types_name,u.unit_name,d.department_name,m.money_source_name FROM `assets` AS a 
    JOIN `assets_types` as t ON a.assets_types_id = t.id 
    JOIN `unit` as u ON a.unit_id = u.id 
    JOIN `department` as d ON a.department_id = d.id 
    JOIN `money_source` as m ON a.money_source_id = m.id WHERE a.id = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $dep_name = array();
    $sql = "SELECT * FROM `department` ";
    $resultdep = mysqli_query($conn, $sql);
    while ($dep = mysqli_fetch_array($resultdep)) {
        array_push($dep_name, ['id' => $dep['id'], 'department_name' => $dep['department_name']]);
    }

    $money_name = array();
    $sql = "SELECT * FROM `money_source` ";
    $resultmoney = mysqli_query($conn, $sql);
    while ($money = mysqli_fetch_array($resultmoney)) {
        array_push($money_name, ['id' => $money['id'], 'money_source_name' => $money['money_source_name']]);
    }

    $unit_name = array();
    $sql = "SELECT * FROM `unit` ";
    $resultunit = mysqli_query($conn, $sql);
    while ($unit = mysqli_fetch_array($resultunit)) {
        array_push($unit_name, ['id' => $unit['id'], 'unit_name' => $unit['unit_name']]);
    }

    $assetstype_name = array();
    $sql = "SELECT * FROM `assets_types` ";
    $resulttype = mysqli_query($conn, $sql);
    while ($type = mysqli_fetch_array($resulttype)) {
        array_push($assetstype_name, ['id' => $type['id'], 'assets_types_name' => $type['assets_types_name']]);
    }
}
?>
<div class="container-fluid">
    <form action="../../assets/db/updateassets.php" method="post" enctype="multipart/form-data">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>เลขครุภัณฑ์</label>
                <input type="text" name="id" class="form-control" placeholder="เลขครุภัณฑ์" value="<?php echo $data['id']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>ปีงบประมาณ</label>
                <input type="text" name="year_of_budget" class="form-control" placeholder="ปีงบประมาณ" value="<?php echo $data['year_of_budget']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>ชื่อครุภัณฑ์</label>
                <input type="text" name="name" class="form-control" placeholder="ชื่อครุภัณฑ์" value="<?php echo $data['asset_name']; ?>">
            </div>
            <div class="col-md-6">
                <label>รายละเอียด</label>
                <input type="text" name="detail" class="form-control" placeholder="รายละเอียด" value="<?php echo $data['detail']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>วันที่เข้ารับ</label>
                <input type="date" name="date_admit" class="form-control" placeholder="วันที่เข้ารับ" value="<?php echo $data['date_admit']; ?>">
            </div>
            <div class="col-md-6">
                <label>มูลค่าครุภัณฑ์</label>
                <input type="text" name="value_assets" class="form-control" placeholder="มูลค่าครุภัณฑ์" value="<?php echo $data['value_asset']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>เลขที่ใบส่งของ</label>
                <input type="text" name="delivery_number" class="form-control" placeholder="เลขที่ใบส่งของ" value="<?php echo $data['number_delivery']; ?>">
            </div>
            <div class="col-md-6">
                <label>ผู้ขาย</label>
                <input type="text" name="seller" class="form-control" placeholder="ผู้ขาย" value="<?php echo $data['seller_name']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>หมายเลขซีเรียล</label>
                <input type="text" name="serial_number" class="form-control" placeholder="หมายเลขซีเรียล" value="<?php echo $data['serial_number']; ?>">
            </div>
            <div class="col-md-6">
                <label>วันหมดประกัน</label>
                <input type="date" name="expiration_date" class="form-control" placeholder="วันหมดประกัน" value="<?php echo $data['expiration_date']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>สถานะ</label>
                <select class='form-select' name='status'>
                    <?php
                    if ($data['status'] == "อยู่ในคลัง") {
                        echo "<option selected> " . $data['status'] . "</option>";
                        echo "<option> ถูกยืม </option>";
                        echo "<option> อยู่ระหว่างซ่อม </option>";
                        echo "<option> จำหน่าย</option>";
                    } else if ($data['status'] == "ถูกยืม") {
                        echo "<option selected> " . $data['status'] . "</option>";
                        echo "<option> อยู่ในคลัง </option>";
                        echo "<option> อยู่ระหว่างซ่อม </option>";
                        echo "<option> จำหน่าย</option>";
                    } else if ($data['status'] == "อยู่ระหว่างซ่อม") {
                        echo "<option selected> " . $data['status'] . "</option>";
                        echo "<option> อยู่ในคลัง </option>";
                        echo "<option> ถูกยืม </option>";
                        echo "<option> จำหน่าย</option>";
                    } else if ($data['status'] == "จำหน่าย") {
                        echo "<option selected> " . $data['status'] . "</option>";
                        echo "<option> อยู่ในคลัง </option>";
                        echo "<option> ถูกยืม </option>";
                        echo "<option> อยู่ระหว่างซ่อม</option>";
                    }
                    ?>
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
                    <img src="<?php echo $data['image'] ?>" width="50px" height="auto" alt="" srcset="">
                    <input type="file" class="form-control-file" name="image">
                </div>
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-3">
                <select class="form-select" name="department_id">
                    <?php
                    if ($data['department_id'] == $dep_name[0]['id']) {
                        echo "<option value='" . $data['department_id'] . "' selected>" . $data['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[1]['id'] . "' >" . $dep_name[1]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[2]['id'] . "' >" . $dep_name[2]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[3]['id'] . "' >" . $dep_name[3]['department_name'] . "</option>";
                    } else if ($data['department_id'] == $dep_name[1]['id']) {
                        echo "<option value='" . $data['department_id'] . "' selected>" . $data['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[0]['id'] . "' >" . $dep_name[0]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[2]['id'] . "' >" . $dep_name[2]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[3]['id'] . "' >" . $dep_name[3]['department_name'] . "</option>";
                    } else if ($data['department_id'] == $dep_name[2]['id']) {
                        echo "<option value='" . $data['department_id'] . "' selected>" . $data['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[0]['id'] . "' >" . $dep_name[0]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[1]['id'] . "' >" . $dep_name[1]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[3]['id'] . "' >" . $dep_name[3]['department_name'] . "</option>";
                    } else if ($data['department_id'] == $dep_name[3]['id']) {
                        echo "<option value='" . $data['department_id'] . "' selected>" . $data['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[0]['id'] . "' >" . $dep_name[0]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[1]['id'] . "' >" . $dep_name[1]['department_name'] . "</option>";
                        echo "<option value='" . $dep_name[2]['id'] . "' >" . $dep_name[2]['department_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="money_source_id">
                    <?php
                    if ($data['money_source_id'] == $money_name[0]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[1]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[2]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[3]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[4]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[5]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[6]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[7]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[8]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[9]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[10]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[11]['id'] . "' >" . $money_name[11]['money_source_name'] . "</option>";
                    } else if ($data['money_source_id'] == $money_name[11]['id']) {
                        echo "<option value='" . $data['money_source_id'] . "' selected>" . $data['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[0]['id'] . "' >" . $money_name[0]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[1]['id'] . "' >" . $money_name[1]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[2]['id'] . "' >" . $money_name[2]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[3]['id'] . "' >" . $money_name[3]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[4]['id'] . "' >" . $money_name[4]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[5]['id'] . "' >" . $money_name[5]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[6]['id'] . "' >" . $money_name[6]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[7]['id'] . "' >" . $money_name[7]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[8]['id'] . "' >" . $money_name[8]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[9]['id'] . "' >" . $money_name[9]['money_source_name'] . "</option>";
                        echo "<option value='" . $money_name[10]['id'] . "' >" . $money_name[10]['money_source_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="assets_types_id">
                    <?php
                    if ($data['assets_types_id'] == $assetstype_name[0]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[1]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[2]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[3]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[4]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[5]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[6]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[7]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[8]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[9]['id'] . "' >" . $assetstype_name[9]['assets_types_name'] . "</option>";
                    } else if ($data['assets_types_id'] == $assetstype_name[9]['id']) {
                        echo "<option value='" . $data['assets_types_id'] . "' selected>" . $data['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[0]['id'] . "' >" . $assetstype_name[0]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[1]['id'] . "' >" . $assetstype_name[1]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[2]['id'] . "' >" . $assetstype_name[2]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[3]['id'] . "' >" . $assetstype_name[3]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[4]['id'] . "' >" . $assetstype_name[4]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[5]['id'] . "' >" . $assetstype_name[5]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[6]['id'] . "' >" . $assetstype_name[6]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[7]['id'] . "' >" . $assetstype_name[7]['assets_types_name'] . "</option>";
                        echo "<option value='" . $assetstype_name[8]['id'] . "' >" . $assetstype_name[8]['assets_types_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" name="unit_id">
                    <?php
                    if ($data['unit_id'] == $unit_name[0]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[1]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[2]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[3]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[4]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[5]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[6]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[7]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[8]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[9]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[10]['id'] . "' >" . $unit_name[10]['unit_name'] . "</option>";
                    } else if ($data['unit_id'] == $unit_name[10]['id']) {
                        echo "<option value='" . $data['unit_id'] . "' selected>" . $data['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[0]['id'] . "' >" . $unit_name[0]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[1]['id'] . "' >" . $unit_name[1]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[2]['id'] . "' >" . $unit_name[2]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[3]['id'] . "' >" . $unit_name[3]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[4]['id'] . "' >" . $unit_name[4]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[5]['id'] . "' >" . $unit_name[5]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[6]['id'] . "' >" . $unit_name[6]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[7]['id'] . "' >" . $unit_name[7]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[8]['id'] . "' >" . $unit_name[8]['unit_name'] . "</option>";
                        echo "<option value='" . $unit_name[9]['id'] . "' >" . $unit_name[9]['unit_name'] . "</option>";
                    }
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
        </div>
    </form>
</div>