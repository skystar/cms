<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright http://bbs.baijiacms.com Licensed under the Apache License, Version 2.0
// +----------------------------------------------------------------------
// | Author: 百家威信 <http://bbs.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
require(WEB_ROOT.'/system/common/lib/lib_core.php');
require(WEB_ROOT.'/system/common/lib/lib_weixin.php');
require(WEB_ROOT.'/system/common/lib/lib_alipay.php');
if(file_exists(WEB_ROOT.'/system/modules/plugin/thirdlogin/qq/lib_qq.php'))
{
require(WEB_ROOT.'/system/modules/plugin/thirdlogin/qq/lib_qq.php');
}