<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 21:54
 */

namespace app\common\lib;


class ClassArr
{
    public static function smsClassStat(){
        return [
            'ali' => 'app\common\lib\sms\AliSms',
            'jd' => 'app\common\lib\sms\JdSms',
        ];
    }

    public static function uploadClassStat(){
        return [
            'text' => 'xxx'
        ];
    }

    public static function initClass($type,$classs,$params = [], $needInstance = false){
        //如果我们工厂模式调用的方法是静态的，那么我们返回类库 AliSms
        //如果不是静态方法,我们就返回对象
        if(!array_key_exists($type,$classs)){
            return false;
        }
        $className = $classs[$type];
        return $needInstance == true ? (new \ReflectionClass($className))->newInstance($params) : $className;
    }
}