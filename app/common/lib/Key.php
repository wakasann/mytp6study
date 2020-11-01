<?php
/**
 * Created by PhpStorm.
 * User: wakasann
 * Date: 2020/11/1
 * Time: 15:00
 */

namespace app\common\lib;


class Key
{
    public static function userKey($userId){
        return 'cart_'.$userId;
    }
}