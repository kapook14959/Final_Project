<?php

include('../layout/masterpage.php');
if (empty($_SESSION['username'])) {
    header('location:/final_project/');
}
include('../../assets/db/connect.php');
$conn = $_SESSION['conn'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT s.*,d.department_name FROM `staffs` as `s` JOIN `department` as `d` ON s.department_id = d.id WHERE s.id =" . $id;
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    $dep_name = array();
    $sql = "SELECT * FROM `department` ";
    $resultdep = mysqli_query($conn, $sql);
    while ($dep = mysqli_fetch_array($resultdep)) {
        array_push($dep_name, ['id' => $dep['id'], 'department_name' => $dep['department_name']]);
    }
}
?>
<div class="container-fluid">
    <h1 style="margin-left:10%;">แก้ไขข้อมูลผู้ใช้งาน</h1>
    <form action="../../assets/db/updateuser.php" method="post">
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <input type="hidden" name="id" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $id; ?>">
                <label>ชื่อผู้ใช้งาน</label>
                <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $data['username']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label>รหัสผ่าน</label>
                <input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" value="<?php echo $data['password']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>ชื่อ</label>
                <input type="text" name="fisrtname" class="form-control" placeholder="ชื่อ" value="<?php echo $data['staff_firstname']; ?>">
            </div>
            <div class="col-md-6">
                <label>นามสกุล</label>
                <input type="text" name="lastname" class="form-control" placeholder="นามสกุล" value="<?php echo $data['staff_lastname']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col-md-6">
                <label>เบอร์มือถือ</label>
                <input type="text" name="telephone" class="form-control" placeholder="เบอร์มือถือ" value="<?php echo $data['telephone']; ?>">
            </div>
            <div class="col-md-6">
                <label>อีเมล์</label>
                <input type="email" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $data['email']; ?>">
            </div>
        </div>
        <div class="row" style="margin: 10px 0 10px 39rem; width:50%;">
            <div class="col">
                <label>สิทธิ์การใช้งาน</label>
                <select class="form-select" name="permission">
                    <?php
                    $option = array("staff", "ceo");
                    if ($data['permission'] == $option[0]) {
                        echo "<option value='" . $data['permission'] . "' selected> เจ้าหน้าที่ </option>";
                        echo "<option value='" . $option[1] . "' > ผู้บริหาร </option>";
                    } else if ($data['permission'] == $option[1]) {
                        echo "<option value='" . $data['permission'] . "' selected> ผู้บริหาร </option>";
                        echo "<option value='" . $option[0] . "' > เจ้าหน้าที่ </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <label>หน่วยงาน</label>
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
                    mysqli_close($conn);
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