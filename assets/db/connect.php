<?php
$host = "localhost";
$port = "3306";
$username = "root";
$password = "12345678";
$dbname = "assetsmanagement";

$conn = new mysqli($host, $username, $password, $dbname);
// $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}",$username,$password);

// session_start();
// $_SESSION['conn'] = $conn;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
