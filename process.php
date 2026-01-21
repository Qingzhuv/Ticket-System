<?php
session_start();
require 'db_config.php';

$action = $_GET['action'];

if($action == 'submit'){
    if($_POST['captcha'] !== $_SESSION['captcha_code']) die("验证码错误");
    
    $order_no = "XX-" . date('Ymd') . "-" . rand(1000, 9999);
    $stmt = $pdo->prepare("INSERT INTO work_orders (order_no, user_name, user_phone, order_type, title, content) VALUES (?,?,?,?,?,?)");
    $stmt->execute([$order_no, $_POST['user_name'], $_POST['user_phone'], $_POST['order_type'], $_POST['title'], $_POST['content']]);
    
    echo "提交成功！工单号：<strong>$order_no</strong> <br><a href='index.php'>返回首页</a>";
}

if($action == 'reply'){
    if(!isset($_SESSION['admin_logged_in'])) die("无权访问");
    
    $stmt = $pdo->prepare("INSERT INTO order_replies (order_no, reply_content, reply_person) VALUES (?,?,?)");
    $stmt->execute([$_POST['order_no'], $_POST['reply_content'], '官方客服中心']);
    
    $pdo->prepare("UPDATE work_orders SET status = 2 WHERE order_no = ?")->execute([$_POST['order_no']]);
    header("Location: admin_dashboard.php?success=1");
}

// process.php 新增部分
if($action == 'user_add_reply'){
    $order_no = $_POST['order_no'];
    $content = htmlspecialchars($_POST['reply_content']);
    $date = $_POST['submit_date'];

    // 写入回复表，身份标注为“用户”
    $stmt = $pdo->prepare("INSERT INTO order_replies (order_no, reply_content, reply_person) VALUES (?, ?, ?)");
    $stmt->execute([$order_no, $content, '用户追加反馈']);

    // 将工单状态改为“异议复核(3)”或保持“处理中(1)”
    $update = $pdo->prepare("UPDATE work_orders SET status = 3 WHERE order_no = ?");
    $update->execute([$order_no]);

    header("Location: query.php?order_no=$order_no&submit_date=$date&msg=success");
}
?>
