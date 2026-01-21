<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) header("Location: admin_login.php");
require 'db_config.php';

// 获取所有工单，按时间倒序
$stmt = $pdo->query("SELECT * FROM work_orders ORDER BY submit_time DESC");
$orders = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>企业工单全量管理后台</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; margin: 0; }
        .nav { background: #1a365d; color: white; padding: 15px 5%; display: flex; justify-content: space-between; }
        .container { padding: 30px 5%; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 15px; border-bottom: 1px solid #eee; text-align: left; }
        .status-0 { color: #e53e3e; font-weight: bold; } /* 未受理 */
        .status-1 { color: #3182ce; } /* 处理中 */
        .status-2 { color: #38a169; } /* 已完成 */
        .btn-reply { background: #1a365d; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="nav">
        <span>官方管理后台 - 全量看板</span>
        <a href="logout.php" style="color:white;">安全退出</a>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>工单编号</th>
                    <th>类型</th>
                    <th>标题</th>
                    <th>状态</th>
                    <th>提交时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $o): ?>
                <tr>
                    <td><strong><?php echo $o['order_no']; ?></strong></td>
                    <td><?php echo $o['order_type']; ?></td>
                    <td><?php echo $o['title']; ?></td>
                    <td class="status-<?php echo $o['status']; ?>">
                        <?php 
                            $status_text = [0=>'待受理', 1=>'处理中', 2=>'已办结', 3=>'异议复核'];
                            echo $status_text[$o['status']];
                        ?>
                    </td>
                    <td><?php echo $o['submit_time']; ?></td>
                    <td><a href="admin_reply_detail.php?no=<?php echo $o['order_no']; ?>" class="btn-reply">详情与回复</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
