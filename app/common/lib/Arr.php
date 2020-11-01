<?php
/**
 * Created by PhpStorm.
 * User: wakasann
 * Date: 2020/11/1
 * Time: 8:51
 */

namespace app\common\lib;


class Arr
{
    /**
     * 无线级分类树
     * @param $data
     * @return array
     */
    public static function getTree($data){
        //累计加库存
        //$stock = array_sum(array_column($res,"stock"));
        $items = [];
        foreach ($data as $v){
            $items[$v['category_id']] = $v;
        }
        $tree = [];
        foreach ($items as $id=>$item){
            $tempPid = $item['pid'];
            if(isset($items[$tempPid])){
                $items[$tempPid]['list'][] = &$items[$id];
            }else{
                $tree[] = &$items[$id];
            }
        }
        return $tree;
    }

    /**
     * 一二三级限制显示的数量
     * @param $data
     * @param int $firstCount
     * @param int $sencondCount
     * @param int $threeCount
     * @return array
     */
    public static function sliceTreeArr($data,$firstCount = 5,$sencondCount = 3,$threeCount = 5){
        $data = array_slice($data,0,$firstCount);
        foreach ($data as $k =>$v){
            if(!empty($v['list'])){
                $data[$k]['list'] = array_slice($v['list'],0,$sencondCount);
                foreach ($v['list'] as $kk=>$vv){
                    if(!empty($vv['list'])){
                        $data[$k]['list'][$kk]['list'] = array_slice($vv['list'],0,$threeCount);
                    }
                }
            }
        }
        return $data;
    }

    public static function arrSortByKey($result, $key,$sort = SORT_DESC){
        if(!is_array($result) || !$key){
            return [];
        }
        array_multisort(array_column($result,'create_time'),$sort,$result);
        return $result;
    }
}