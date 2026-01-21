<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员登录 - 官方工单管理系统</title>
    <style>
        :root { --primary-blue: #1a365d; --soft-bg: #f4f7f9; }
        body { background: var(--primary-blue); height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; font-family: "Microsoft YaHei", sans-serif; }
        .login-container { background: white; width: 400px; padding: 50px; border-radius: 4px; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
        .login-header { text-align: center; margin-bottom: 40px; }
        .login-header h2 { color: var(--primary-blue); font-size: 24px; letter-spacing: 1px; margin: 0; }
        .login-header p { color: #888; font-size: 14px; margin-top: 10px; }
        .form-group { margin-bottom: 25px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; color: #555; font-size: 14px; }
        input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 2px; box-sizing: border-box; transition: 0.3s; }
        input:focus { border-color: var(--primary-blue); outline: none; box-shadow: 0 0 5px rgba(26,54,93,0.1); }
        .btn-login { width: 100%; padding: 14px; background: var(--primary-blue); color: white; border: none; border-radius: 2px; font-size: 16px; cursor: pointer; transition: 0.3s; }
        .btn-login:hover { background: #2c5282; }
        .back-link { display: block; text-align: center; margin-top: 20px; color: #888; text-decoration: none; font-size: 13px; }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-header">
        <h2>官方后台管理</h2>
        <p>INTERNAL ADMINISTRATION PANEL</p>
    </div>
    
    <form action="auth.php" method="POST">
        <div class="form-group">
            <label>管理员账号</label>
            <input type="text" name="username" required autocomplete="off">
        </div>
        <div class="form-group">
            <label>安全口令</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" class="btn-login">确认授权登录</button>
    </form>
    
    <a href="index.php" class="back-link">← 返回门户首页</a>
</div>

</body>
</html>
