<?php require 'db_config.php'; ?>
<!DOCTYPE html>
<!-- 
/**
 * WESTCRAN 工单解决方案
 * * Copyright (C) 2026-现在 WESTCRAN 西鹤软件 (www.westcran.tech)
 * * 本程序是自由软件：您可以根据自由软件基金会发布的 GNU 通用公共许可协议（GPL）
 * * 第 3 版或者任何更高版本的条款进行再分发和/或修改。
 * 本程序的发布是希望其能发挥作用，但没有任何担保；甚至没有对
 * 适销性或特定用途适用性的暗示担保。详情请参阅 GNU 通用公共许可协议。
 * * 您应该已经随本程序收到了一份 GNU 通用公共许可协议的副本。
 * *如果没有，请参阅 <https://www.gnu.org/licenses/>。
 */
-->
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>工单进度追踪与互动</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* 布局优化，确保页脚在底部 */
        body { 
            margin: 0; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
            background: #f8f9fa; 
            font-family: "Helvetica Neue", sans-serif;
        }
        .main-content { 
            flex: 1; 
            padding: 40px 20px; 
        }
        .container { 
            max-width: 800px; 
            margin: 0 auto; 
            background: white; 
            padding: 40px; 
            border-radius: 8px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
        }
        
        /* 页脚专用样式 */
        footer {
            background: #ffffff;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #eee;
            color: #888;
            font-size: 14px;
            line-height: 1.8;
        }
        .footer-link {
            text-decoration: none;
            font-style: italic;
            font-weight: bold;
        }
        .disclaimer {
            margin: 0;
            font-size: 12px;
            color: #bbb;
        }
        .brand-logo {
            font-style: italic;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="container">
            <h2 style="color:#1a365d;">工单服务追踪</h2>
            <form method="GET" style="margin-bottom:30px;">
                <input type="date" name="submit_date" required value="<?php echo $_GET['submit_date']??''; ?>">
                <input type="text" name="order_no" placeholder="工单编号" required value="<?php echo $_GET['order_no']??''; ?>">
                <button type="submit" style="background:#1a365d; color:white; padding:10px 20px; border:none; cursor:pointer;">即时查询</button>
            </form>

            <?php
            if(isset($_GET['order_no'])):
                $stmt = $pdo->prepare("SELECT * FROM work_orders WHERE order_no = ? AND DATE(submit_time) = ?");
                $stmt->execute([$_GET['order_no'], $_GET['submit_date']]);
                $order = $stmt->fetch();

                if($order):
            ?>
                <div class="result">
                    <div style="background:#eef2f7; padding:20px; border-radius:4px;">
                        <h4>工单信息：<?php echo $order['order_no']; ?></h4>
                        <p>当前状态：<strong><?php echo ($order['status']==2?'已办结':'处理中'); ?></strong></p>
                        <p>内容描述：<?php echo nl2br($order['content']); ?></p>
                    </div>

                    <h4 style="margin-top:30px;">官方处理记录：</h4>
                    <?php
                    $replies = $pdo->prepare("SELECT * FROM order_replies WHERE order_no = ? ORDER BY reply_time ASC");
                    $replies->execute([$order['order_no']]);
                    while($r = $replies->fetch()):
                    ?>
                        <div style="padding:15px; border-bottom:1px solid #eee; position:relative;">
                            <span style="font-size:12px; color:#999;"><?php echo $r['reply_time']; ?></span>
                            <p><strong><?php echo $r['reply_person']; ?>：</strong><?php echo nl2br($r['reply_content']); ?></p>
                        </div>
                    <?php endwhile; ?>

                    <div style="margin-top:40px; border-top:2px solid #1a365d; padding-top:20px;">
                        <h4>补充说明/提出异议：</h4>
                        <form action="process.php?action=user_add_reply" method="POST">
                            <input type="hidden" name="order_no" value="<?php echo $order['order_no']; ?>">
                            <input type="hidden" name="submit_date" value="<?php echo $_GET['submit_date']; ?>">
                            <textarea name="reply_content" style="width:100%; height:100px; padding:10px; box-sizing:border-box;" placeholder="如有异议 or 需补充材料，请在此输入..." required></textarea>
                            <button type="submit" style="margin-top:10px; background:#1a365d; color:white; border:none; padding:10px 20px; cursor:pointer;">提交反馈</button>
                        </form>
                    </div>
                </div>
            <?php else: echo "<p style='color:red;'>未查询到相关记录，请核对信息。</p>"; endif; ?>
            <?php endif; ?>
        </div>
    </div>


        <footer style="text-align: center; padding: 30px 0; background: #ffffff; border-top: 1px solid #eee; line-height: 1.8;">
            <p style="margin: 0; font-size: 15px; color: #333;">
                ©2025-现在
                <a href="https://www.westcran.tech" target="_blank" style="text-decoration: none; font-style: italic; font-weight: bold;">
                    <span style="color: #000000;">WEST</span><span style="color: #007bff;">CRAN</span><span style="color: #000000;">西鹤软件</span>
                </a> 
                版权所有
            </p>
            <p style="margin: 0; font-size: 12px; color: #bbb;">
                <span style="font-style: italic; font-weight: bold;">
                </span>一切纠纷与开发者<span style="color: #000000;">WEST</span><span style="color: #007bff;">CRAN</span>无关
            </p>
            <p style="font-size: 10px; color: #ccc;">
            基于 <a href="https://www.gnu.org/licenses/gpl-3.0.html">GPL v3.0</a>
            | 在<a href="https://github.com/Qingzhuv/Ticket-System">Github</a>开源
            </p>
        </footer>
</body>
</html>
