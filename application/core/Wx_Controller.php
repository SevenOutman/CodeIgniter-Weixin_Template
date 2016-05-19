<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Wx_Controller
 * 适用于微信的 Controller 父类
 * 此父类提供:
 *  - user 属性, 代表当前登录微信用户
 *  - wx 属性, 代表加载的 Wx_library
 *  - currentUrl 方法, 返回当前完整 url, 比 current_url 方法更准确
 *  - success 和 fail 方法, @see Wx_Controller::success()
 * @property Wx_library $wx
 * @property CI_Session $session
 * @property CI_DB      $db
 * @property CI_Input   $input
 * @property CI_Loader  $load
 */
class Wx_Controller extends CI_Controller
{
    /** @var  WxUser $user */
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Wx_library', null, 'wx');

        $this->user = $this->wx->getWxUser();
    }

    /**
     * 当前完整url
     */
    protected function currentUrl()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' or $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

        return $protocol . $this->input->server('HTTP_HOST') . $this->input->server('REQUEST_URI');
    }


    /**
     * 用于ajax
     *
     * @param array $info
     *
     * @return string
     */
    protected function success($info = array())
    {
        return json_encode(array(
                               'code'   => 0,
                               'result' => 'success',
                               'info'   => $info,
                           ));
    }

    /**
     * 用于ajax
     *
     * @param array $errmsg
     * @param int   $code
     *
     * @return string
     */
    protected function fail($errmsg = array(), $code = 0xFFFFFF)
    {
        return json_encode(array(
                               'code'   => $code,
                               'result' => 'fail',
                               'errmsg' => $errmsg,
                           ));
    }
}