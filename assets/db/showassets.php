<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "12345678";
$dbname = "assetsmanagement";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT a.*,t.assets_types_name,u.unit_name,d.department_name,m.money_source_name FROM `assets` AS a 
JOIN `assets_types` as t ON a.assets_types_id = t.id 
JOIN `unit` as u ON a.unit_id = u.id 
JOIN `department` as d ON a.department_id = d.id 
JOIN `money_source` as m ON a.money_source_id = m.id";

if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['department_name'] . "</td>";
            echo "<td>" . $row['money_source_name'] . "</td>";
            echo "<td>" . $row['year_of_budget'] . "</td>";
            echo "<td>" . $row['asset_name'] . "</td>";
            echo "<td>" . $row['detail'] . "</td>";
            echo "<td>" . $row['unit_name'] . "</td>";
            echo "<td>" . $row['date_admit'] . "</td>";
            echo "<td>" . $row['value_asset'] . "</td>";
            echo "<td>" . $row['number_delivery'] . "</td>";
            echo "<td>" . $row['seller_name'] . "</td>";
            echo "<td>" . $row['serial_number'] . "</td>";
            echo "<td>" . $row['expiration_date'] . "</td>";
            echo "<td>" . $row['assets_types_name'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            if($row['detail_borrow_and_return'] == null){
                echo "<td> - </td>";
            }
            else{
                echo "<td>" . $row['detail_borrow_and_return'] . "</td>";
            }
            
            if($row['qr-code'] == null ){
                echo "<td> NO QR-CODE </td>";
            }
            else{
                echo "<td>" . $row['qr-code'] . "</td>";
            }
            if($row['image'] == null ){
                echo "<td> NO IMAGE </td>";
            }
            else{
                echo "<td><img src='".$row['image']."' width='50px' height='auto'></td>"; 
            }
            echo "<td>" . "<a class='btn' onclick=EditAssets('" . $row['id'] . "')> <i class='bi bi-pencil-square'></i></a>" . "</td>";
            echo "</tr>";
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

mysqli_close($conn);