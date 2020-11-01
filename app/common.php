<?php
// 应用公共文件

if(!function_exists('json_response')){
    function json_response($code,$message = 'ok',$data = [], $httpStatusCode = 200){
        $result = [
            'status' => $code,
            'message' => $message,
            'data' => $data
        ];
        return json($result,$httpStatusCode);
    }
}