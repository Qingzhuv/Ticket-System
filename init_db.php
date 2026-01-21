<?php
$host = 'localhost';
$user = 'root';
$pass = 'root123'; // 您的数据库密码

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->exec("CREATE DATABASE IF NOT EXISTS corp_system DEFAULT CHARACTER SET utf8mb4");
    $pdo->exec("USE corp_system");

    // 工单表
    $pdo->exec("CREATE TABLE IF NOT EXISTS work_orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_no VARCHAR(32) UNIQUE,
        user_name VARCHAR(50),
        user_phone VARCHAR(20),
        order_type VARCHAR(20),
        title VARCHAR(200),
        content TEXT,
        status TINYINT DEFAULT 0,
        submit_time DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // 回复表
    $pdo->exec("CREATE TABLE IF NOT EXISTS order_replies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_no VARCHAR(32),
        reply_content TEXT,
        reply_person VARCHAR(50),
        reply_time DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    // 管理员表
    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE,
        password VARCHAR(255)
    )");

    // 预设管理员：admin / admin123
    $hash = password_hash('admin123', PASSWORD_DEFAULT);
    $pdo->prepare("INSERT IGNORE INTO admins (username, password) VALUES ('admin', ?)")->execute([$hash]);

    echo "系统初始化成功！默认账号：admin 密码：admin123 (请务必在正式环境修改)";
} catch (PDOException $e) { die("初始化失败: " . $e->getMessage()); }
?>
