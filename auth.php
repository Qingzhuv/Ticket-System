<?php
session_start();
require 'db_config.php'; // 引入数据库连接配置

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    if (empty($user) || empty($pass)) {
        die("<script>alert('请输入账号和密码'); history.back();</script>");
    }

    try {
        // 1. 根据用户名查询管理员
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ? LIMIT 1");
        $stmt->execute([$user]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // 2. 比对哈希密码
        if ($admin && password_verify($pass, $admin['password'])) {
            // 3. 登录成功：生成新的Session ID防止会话固定攻击
            session_regenerate_id(true);
            
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_user'] = $admin['username'];
            
            // 4. 重定向至管理后台看板
            header("Location: admin_dashboard.php");
            exit;
        } else {
            // 5. 登录失败：不明确告知是账号错还是密码错，增强安全性
            echo "<script>alert('凭据校验失败，请核对后重试'); history.back();</script>";
        }
    } catch (PDOException $e) {
        // 生产环境下不应直接输出错误详情，此处仅为调试方便
        error_log($e->getMessage());
        die("系统认证模块异常，请联系技术团队。");
    }
} else {
    // 非POST请求重定向
    header("Location: admin_login.php");
}
?>
