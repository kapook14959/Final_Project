<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../assets/css/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="../../assets/js/function.js"></script>
    <title>AssetsMangements</title>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <a href="../dashboard/dashboard.php"><img src="../../assets/images/logo-footer.png" alt="logo"></a>
            <ul>
                <li><a href="../dashboard/dashboard.php"><i class="bi bi-graph-up"></i> รายงานครุภัณฑ์</a></li>
                <li><a href="../borrow-and-return/borrow-and-return.php"><i class="bi bi-arrow-left-right"></i> ยืม - คืน ครุภัณฑ์</a></li>
                <li><a href="../sells-assets/sells-assets.php"><i class="bi bi-cart3"></i> จำหน่ายครุภัณฑ์</a></li>
                <li><a href="../repair-notice/repair-notice.php"><i class="bi bi-gear"></i> แจ้งซ่อมครุภัณฑ์</a></li>
                <?php
                if( $_SESSION['status'] == "admin"){
                    echo '<li><a href="../detail-assets/detail-assets.php"><i class="bi bi-tv"></i> จัดการครุภัณฑ์</a></li>
                    <li>
                        <div onmouseover="ShowSubmenu(true)" onmouseout="HideSubmenu(true)"><a><i class="bi bi-info"></i> จัดการข้อมูลทั่วไป</a> 
                            <ul class="sub-menu" id="hide">
                                <li><a href="../unit/unit.php"><i class="bi bi-circle"></i> จัดการข้อมูลหน่วยนับ</a></li>
                                <li><a href="../department/department.php"><i class="bi bi-circle"></i> จัดการข้อมูลหน่วยงาน</a></li>
                                <li><a href="../money-source/money-source.php"><i class="bi bi-circle"></i> จัดการข้อมูลแหล่งเงิน</a></li>
                                <li><a href="../assets-types/assets-types.php"><i class="bi bi-circle"></i> จัดการข้อมูลประเภทครุภัณฑ์</a></li> 
                            </ul>
                        </div>
                    </li>
                    <li><a href="../user-management/user-management.php"><i class="bi bi-people-fill"></i> จัดการผู้ใช้งาน</a></li>';
                }
                ?>
            </ul> 
        </div>
        <div class="header">
                <div class="row">
                    <div class="UserBox text-end">
                        <div class="username" ><?php echo $_SESSION['username'] ?></div>
                        <div class="info" onclick="Log_out(true);"> <i class="bi bi-box-arrow-right"></i></div>
                    </div>
                </div> 
        </div>
    </div>
</body>

</html>