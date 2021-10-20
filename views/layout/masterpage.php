<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>AssetsMangements</title>
</head>

<body>
    <div class="header">
        <div class="logoimg">
            <a href="../layout/masterpage.php"><img src="../../assets/image/logo.png" alt="" width="70" height="70"></a>
        </div>
    </div>
    <div class="nav">
        <ul>
            <li>รายงานครุภัณฑ์</li>
            <li>จัดการครุภัณฑ์</li>
            <li>จำหน่ายครุภัณฑ์</li>
            <li>แจ้งซ่อมครุภัณฑ์</li>
            <li>ยืม - คืน ครุภัณฑ์</li>
            <li><a href="../user-management/user-management.php"> จัดการผู้ใช้งาน</a></li>
        </ul>
    </div>
    <div class="container">
        <?php if (empty($content)) {
            echo "<h1>Hello World</h1>";
        } else {
            echo $content;
        } ?>
    </div>
</body>

</html>