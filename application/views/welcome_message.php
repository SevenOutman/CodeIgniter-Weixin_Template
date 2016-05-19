<?php
/**
 * @var WxUser        $user
 * @var array         $signPackage
 * @var CI_Controller $this
 */
?>
<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <style>

        body {
            background-color: #fff;
            padding: 15px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        .table td,
        .table th {
            background-color: #fff !important;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #ddd !important;
        }

        table {
            background-color: transparent;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse !important;
        }

        .table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

        .table-bordered {
            border: 1px solid #ddd;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th,
        .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td,
        .table-bordered > tfoot > tr > td {
            border: 1px solid #ddd;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
            border-bottom-width: 2px;
        }

        td img {
            max-width: 100%;
            display: block;
        }
    </style>
</head>
<body>
<h1>Welcome to CodeIgniter-Weixin_Template!</h1>

<div id="body">
    <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

    <p>If you would like to edit this page you'll find it located at:</p>
    <code>application/views/welcome_message.php</code>

    <p>The corresponding controller for this page is found at:</p>
    <code>application/controllers/Welcome.php</code>

    <p>You can check the tables below to see how correctly this template is working.</p>
</div>

<div id="userinfo">
    <h1>Current Weixin User</h1>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>openid</td>
            <td><?= $user->openid ?></td>
        </tr>
        <tr>
            <td>nickname</td>
            <td><?= $user->nickname ?></td>
        </tr>

        <tr>
            <td>sex</td>
            <td><?= $user->sex % 2 ? '男' : '女' ?></td>
        </tr>
        <tr>
            <td>province</td>
            <td><?= $user->province ?></td>
        </tr>

        <tr>
            <td>city</td>
            <td><?= $user->city ?></td>
        </tr>

        <tr>
            <td>country</td>
            <td><?= $user->country ?></td>
        </tr>
        <tr>
            <td>avatar</td>
            <td><img src="<?= $user->headimgurl ?>" alt="<?= $user->nickname ?>" onclick="preview(this)"></td>
        </tr>
        </tbody>
    </table>
</div>

<div id="jssdk" style="display: none">
    <h1>JS-SDK API List</h1>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>debug</td>
            <td><?= $signPackage['debug'] ? 'true' : 'false' ?></td>
        </tr>
        <tr>
            <td>appId</td>
            <td><?= $signPackage['appId'] ?></td>
        </tr>
        <tr>
            <td>nonceStr</td>
            <td><?= $signPackage['nonceStr'] ?></td>
        </tr>
        <tr>
            <td>timestamp</td>
            <td><?= $signPackage['timestamp'] ?></td>
        </tr>
        <tr>
            <td>signature</td>
            <td style="word-break: break-all"><?= $signPackage['signature'] ?></td>
        </tr>
        <tr>
            <td rowspan="<?= count($signPackage['jsApiList']) + 1 ?>">
                jsApiList
            </td>
        </tr>
        <?php foreach ($signPackage['jsApiList'] as $jsApi): ?>
            <tr>
                <td><?= $jsApi ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong>
    seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
</p>

<script src="http://res.wx.qq.com/open/js/jweixin-1.1.0.js"></script>
<script>
    var user = <?=json_encode($user)?>;
    var signPackage = <?=json_encode($signPackage)?>;
    if ('addEventListener' in document) {
        document.addEventListener('DOMContentLoaded', function() {
            wx.config(signPackage);
            wx.ready(function() {
                document.getElementById('jssdk').style.display = 'block';
            });
        }, false);
    }
</script>
</body>
</html>