<?php

$http = new swoole_http_server('0.0.0.0',9501);
$http->set([
    'enable_static_handler' => true,
    'document_root' => '/www/wwwroot/swoole_mooc/tp5/public/static',
]);
$http->on('request',function ($request,$response){
    echo  __DIR__."/../public/static";
});

$http->start();