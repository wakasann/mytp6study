<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 21:47
 */

namespace app\common\lib\sms;


class JdSms implements SmsBase
{
    public function sendCode($phoneNumber, $code)
    {
        return true;
        // TODO: Implement sendCode() method.
    }
}