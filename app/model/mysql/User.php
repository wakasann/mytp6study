<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 22:14
 */

namespace app\model\mysql;


use think\facade\Cache;
use think\Model;

class User extends Model
{
    protected $autoWriteTimestamp = true;

    public function add(){
        try{
            //withSearch() 搜索
            //
            //使用这个方法可以替换foreach循环 $arr['sku_id'] = $id
            // array_column($res,'id','sku_id');

            // preg_replace('/(<img.+?src=")(.*?)")/','$1'.$request->domain().'$2',$desc)
            //使用redis做商品的pv
            //Cache::inc("mall_pv_".$id);
            $options = [
                'name' => '商品1',
                'id' => 1,
                'sku_id' => 1,
                'num' => 1,
                'image' => ''
            ];
            //Cache::hSet("cart_token",$goodsId,$options);
        }catch (\Exception $e){
            throw new \think\Exception("服务内部出错");
        }
    }
}