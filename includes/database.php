<?php
$host     = 'mysql-b5f7010-hit-b6b2.k.aivencloud.com';
$port     = '14994';
$dbname   = 'defaultdb';
$username = 'avnadmin';
$password = 'AVNS_ZDaNdVo4AOSGI8sjIvI'; // Copy this from the Overview tab (click the eye icon to unhide)

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>