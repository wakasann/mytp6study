<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 21:48
 */

declare(strict_types=1);
namespace app\common\service;


use app\common\lib\ClassArr;
use app\common\lib\Num;

class Sms
{
    public static function sendCode(string $phoneNumber,int $len = 4,string $type = 'ali'):bool {
        $code = Num::getCode($len);
        //作业如20%使用AliSms,80% 使用其它SMS
        //工厂方式
//        $type = ucfirst($type);
//        $class = "\app\common\lib\sms\\".$type."Sms";
//        $class::sendCode($phoneNumber,$code);

        $classStats = ClassArr::smsClassStat();
        $classObject = ClassArr::initClass($type,$classStats);
        $result = $classObject::sendCode($phoneNumber,$code);
    }
}