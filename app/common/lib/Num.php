<?php
/**
 * 与数字有关的类
 * User: Administrator
 * Date: 2020/10/31
 * Time: 21:49
 */

namespace app\common\lib;


class Num
{
    public static function getCode(int $len = 4) : int{
        $code = mt_rand(1000,9999);
        if($len){
            $code = mt_rand(100000,999999);
        }
        return $code;
    }
}