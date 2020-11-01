<?php
/**
 * Created by PhpStorm.
 * User: wakasann
 * Date: 2020/11/1
 * Time: 14:51
 */

namespace app\common\service;


use app\common\lib\Arr;
use app\common\lib\Key;
use think\facade\Cache;

class Cart extends ServiceBase
{
    public function insertRedis($cartToken,$productId,$skuId,$num){
        $data = [

        ];

        try{
            $get = Cache::hGet(Key::userKey(1),$productId);
            if($get){
                $get = json_decode($get,true);
                $data['num'] = $data['num'] + $get['num'];
            }
            $res = Cache::hSet(Key::userKey(1),$productId,$data);
        }catch (\Exception $e){
            return FALSE;
        }
    }

    public function lists($userId,$ids){
        try{
            if($ids){
                $ids = explode(",",$ids);
                $res = Cache::hMget(Key::userKey($userId),$ids);
                if(in_array(false,array_values($res))){
                    return [];
                }
            }else{
                $res = Cache::hGetAll(Key::userKey(1));
            }

        }catch (\Exception $e){
            return [];
        }

        if(!$res){
            return [];
        }

        $result = [];
        $skuIds = array_keys($res);

        $stocks = [];
        //从数据表中查询商品信息
        foreach ($res as $k=>$v){
            $v = json_decode($v,true);
            if($ids && isset($stocks[$k]) && $stocks[$k] < $v['num']){
                throw new \think\Exception($v['titlle'].'库存不足');;
            }
            $v['id'] = $k;
            $v['image'] = preg_match('/http:\/\//',$v['image'])?$v['image']:request()->domain().$v['image'];
            $result[] = $v;
        }

        if(!empty($result)){
            Arr::arrSortByKey($result,'create_time');
        }

        //删除
        //Cache::hDel(Key::userKey(1),$productId);
        //更新 Hset(key,$id,$data);

        //购物车删除数据，请求Api删除之后，前端就移除对应行的数据，不用再次请求获取购物车列表

        //减少库存，批量更新

        return $result;
    }

    public function getCount($userId){
        try{
            $count = Cache::hLen(Key::userKey($userId));
        }catch (\Exception $e){
            return 0;
        }

        //雪花算法
        // https://github.com/52thy/IDwork
        //php-snowflake
        return intval($count);

    }
}