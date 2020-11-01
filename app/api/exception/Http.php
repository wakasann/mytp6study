<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/10/31
 * Time: 20:54
 */

declare(strict_types=1);

namespace app\api\exception;

use think\exception\Handle;
use think\Response;
use Throwable;

class Http extends Handle
{
    public $httpStatusCode = 500;
    /**
     * Render an exception into an HTTP response.
     *
     * @access public
     * @param \think\Request   $request
     * @param Throwable $e
     * @return Response
     */
    public function render($request, Throwable $e): Response
    {
        if($e instanceof \think\Exception){
            return json_response($e->getCode(),$e->getMessage());
        }
        if($e instanceof \think\exception\HttpResponseException){
            return parent::render($request,$e);
        }
        // 添加自定义异常处理机制
       if(method_exists($e,'getStatusCode')){
           $this->httpStatusCode = $e->getStatusCode();
       }
        return json_response(config('status.error'),$e->getMessage(),[], $this->httpStatusCode);
        // 其他错误交给系统处理
        //return parent::render($request, $e);
    }
}