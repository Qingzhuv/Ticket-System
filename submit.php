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
    <title>提交工单 - 官方门户</title>
    <style>
        .form-wrap { max-width: 600px; margin: 50px auto; background: white; padding: 40px; border: 1px solid #ddd; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; box-sizing: border-box; }
        .btn-submit { background: #1a365d; color: white; border: none; padding: 15px; width: 100%; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-wrap">
        <h2>提交您的反馈与诉求</h2>
        <form action="process.php?action=submit" method="POST">
            <div class="form-group"><label>您的姓名</label><input type="text" name="user_name" required></div>
            <div class="form-group"><label>联系电话</label><input type="text" name="user_phone" required></div>
            <div class="form-group">
                <label>工单类型</label>
                <select name="order_type">
                    <option value="体验建议">体验建议</option>
                    <option value="投诉维权">投诉维权</option>
                </select>
            </div>
            <div class="form-group"><label>问题标题</label><input type="text" name="title" required></div>
            <div class="form-group"><label>详细描述</label><textarea name="content" rows="6" required></textarea></div>
            <div class="form-group">
                <label>验证码</label>
                <div style="display:flex; gap:10px;">
                    <input type="text" name="captcha" required>
                    <img src="captcha.php" onclick="this.src='captcha.php?'+Math.random()">
                </div>
            </div>
            <button type="submit" class="btn-submit">正式提交工单</button>
        </form>
        <hr>
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
    </div>
</body>
</html>
