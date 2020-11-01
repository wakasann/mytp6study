<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 22:19
 */

namespace app\common\lib;


class Str
{
    public static function generateLoginToken($string){
        $str = md5(uniqid((md5(microtime(true))),true));
        $token = sha1($str,$string);
        return $token;
    }
}