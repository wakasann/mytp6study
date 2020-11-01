<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 21:46
 */

namespace app\common\lib\sms;


interface SmsBase
{
    public function sendCode($phoneNumber,$code);
}