<?php
$host     = 'mysql-film-content-creator.alwaysdata.net'; // Alwaysdata Host
$dbname   = 'film-content-creator_society'; // Alwaysdata DB Name
$username = 'film-content-creator';                      // Alwaysdata Username
$password = 'rFbT_83.u-KU2j#';          // Alwaysdata Password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>