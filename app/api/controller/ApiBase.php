<?php
/**
 * Created by PhpStorm.
 * User: wakasann
 * Date: 2020/10/31
 * Time: 22:43
 */

namespace app\api\controller;


use app\BaseController;

class ApiBase extends BaseController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
    }

    public function json_response(...$args){
        throw new \think\exception\HttpResponseException(json_response(...$args));
    }
}