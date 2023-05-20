<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "usuarios";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die('Connected failed' . $error->getMessage());
}
?>
