# CodeIgniter-Weixin_Template

配备了微信网页授权模块的CodeIgniter应用脚手架

## What's this

此项目为基于`CodeIgniter 3.0.6`框架搭建的PHP应用程序脚手架, 预装了[适用于CodeIgnitor框架的微信网页授权模块][1]。

如果你尚不了解CodeIgniter, 你可以参阅它的[官网][2]或者[Github仓库][4]。

如果你是使用CodeIgniter的开发者, 但只是需要一个微信网页授权模块, 而不是整个框架, 你可以查看[我的另一个仓库][1], 它是即插即用的。

## 安装

CodeIgniter框架解压即可开始使用, 无需安装过程。同样, 你只需下载最新的release就可以开始使用此脚手架。

## What's included

```
<?php
/**
 * application/core/Wx_Controller.php
 *
 * 适用于微信的 Controller 父类,
 * 继承自此类的 Controller 都可以使用微信网页授权,
 * 不希望使用微信网页授权的 Controller 只需继承原生 CI_Controller 即可
 *
 * @property WxUser $user 当前微信用户
 * @property Wx_library $wx
 */
class Wx_Controller extends CI_Controller
{
    // ...
}
```

## Demo

你可以使用微信扫一扫来查看demo

![qrcode][3]

[1]: https://github.com/SevenOutman/CodeIgniter-Weixin_Library
[2]: https://codeigniter.com
[3]: http://summer.emcbidding.com/test/demo.png
[4]: https://github.com/bcit-ci/CodeIgniter