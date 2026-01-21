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
    <title>企业官方投诉与建议门户</title>
    <style>
        body { margin:0; font-family: "Helvetica Neue", sans-serif; background: #f8f9fa; color: #333; min-height: 100vh; display: flex; flex-direction: column; }
        .hero { background: #1a365d; color: white; padding: 120px 5%; text-align: center; }
        .hero h1 { font-size: 42px; margin-bottom: 20px; }
        .container { max-width: 1000px; margin: -50px auto 50px; display: flex; gap: 30px; justify-content: center; flex: 1; }
        .card { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); text-align: center; flex: 1; text-decoration: none; color: inherit; transition: 0.3s; height: fit-content; }
        .card:hover { transform: translateY(-10px); }
        .btn { background: #1a365d; color: white; padding: 12px 30px; border-radius: 4px; display: inline-block; margin-top: 20px; }

        /* 新增页脚样式 */
        footer {
            background: #ffffff;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #eee;
            color: #888;
            font-size: 14px;
            line-height: 1.8;
        }
        footer a {
            color: #1a365d;
            text-decoration: none;
            font-weight: bold;
        }
        footer a:hover {
            text-decoration: underline;
        }
        .disclaimer {
            font-size: 12px;
            color: #bbb;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>XX官方体验反馈平台</h1>
        <p>严谨受理、专业核查、官方闭环回复</p>
    </div>
    
    <div class="container">
        <a href="submit.php" class="card">
            <h3>我要提交工单</h3>
            <p>反馈体验建议或投诉服务问题</p>
            <span class="btn">立即发起</span>
        </a>
        <a href="query.php" class="card">
            <h3>进度/结果查询</h3>
            <p>凭工单号与提交日期实时追踪</p>
            <span class="btn">前往查询</span>
        </a>
    </div>

    <footer>
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
    </footer>
</body>
</html>
