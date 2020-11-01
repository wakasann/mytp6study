<?php
/**
 * Created by PhpStorm.
 * User: wakasann
 * Date: 2020/11/1
 * Time: 15:44
 */

namespace app\api\controller\mall;


use app\common\service\Cart;

class Init
{
    public function index(){
        (new Cart())->getCount(1);
    }
}