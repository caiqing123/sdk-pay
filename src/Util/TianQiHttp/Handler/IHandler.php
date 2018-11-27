<?php
namespace TianQi\PaySDK\Util\TianQiHttp\Handler;

use TianQi\PaySDK\Util\TianQiHttp\Http\Psr7\Response;

interface IHandler
{
    /**
     * 发送请求
     * @param \TianQi\Util\TianQiHttp\Http\Request $request
     * @return void
     */
    public function send($request);

    /**
     * 接收请求
     * @return \TianQi\Util\TianQiHttp\Http\Response
     */
    public function recv();
}