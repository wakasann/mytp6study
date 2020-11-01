<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 22:25
 */

namespace app\common\lib;


class Time
{
    /**
     * 过期时间
     * @param int $type
     * @return float|int
     */
    public static function userLoginExpiresTime($type = 2){
        $type = !in_array($type,[1,2])?2:$type;
        if($type == 1){
            $day = $type * 7;
        }else if($type == 2){
            $day = $type * 30;
        }
        return $day * 24 * 3600;
    }
}