<!DOCTYPE html>
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
                本系统由 
                <a href="https://www.westcran.tech" target="_blank" style="text-decoration: none; font-style: italic; font-weight: bold;">
                    <span style="color: #000000;">WEST</span><span style="color: #007bff;">CRAN</span><span style="color: #000000;">西鹤软件</span>
                </a> 
                友情赞助
            </p>
            <p style="margin: 0; font-size: 12px; color: #bbb;">
                <span style="font-style: italic; font-weight: bold;">
                    <span style="color: #000000;">WEST</span><span style="color: #007bff;">CRAN</span>
                </span>友情赞助，一切纠纷与<span style="color: #000000;">WEST</span><span style="color: #007bff;">CRAN</span>无关
            </p>
            <p style="font-size: 10px; color: #ccc;">
            基于 <a href="https://www.gnu.org/licenses/gpl-3.0.html">GPL v3.0</a>
            | 在<a href="https://github.com/Qingzhuv/Ticket-System">Github</a>开源
            </p>
        </footer>
    </div>
</body>
</html>
