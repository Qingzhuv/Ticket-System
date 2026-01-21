<?php
$pdo = new PDO("mysql:host=localhost;dbname=corp_system;charset=utf8mb4", "root", "root123");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
