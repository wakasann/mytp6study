<?php
use app\api\exception\Http;

// 容器Provider定义文件
return [
    'think\exception\Handle' => "\\app\\api\\exception\\Http",
];
