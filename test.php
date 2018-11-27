<?php
/**
 * 支付宝手机网站支付Demo
 */
require './vendor/autoload.php';

use TianQi\PaySDK\Alipay\Params\PublicParams;






//require './Http/HttpRequest.php';
//require 'RequestBase.php';
//require 'Base.php';
//require 'PublicBase.php';
//require 'AlipayRequestBase.php';
//require './Traits/JSONParams.php';
//
//require './Alipay/Params/PublicParams.php';
//require './Alipay/SDK.php';
//require './Alipay/Wap/Params/Pay/Request.php';
//require './Alipay/Wap/Params/Pay/ExtendParams.php';
//require './Alipay/Wap/Params/Pay/BusinessParams.php';
//require './Lib/Encrypt/Base.php';
//require './Lib/ObjectToArray.php';
//require './Lib/Encrypt/RSA2.php';



// 公共配置
$params = new PublicParams;
$params->appID = '';
$params->appPrivateKey = '';
//$params->appPrivateKeyFile = 'dasda'; // 证书文件，如果设置则这个优先使用

// SDK实例化，传入公共配置
$pay = new \TianQi\PaySDK\Alipay\SDK($params);

// 支付接口
$request = new \TianQi\PaySDK\Alipay\Wap\Params\Pay\Request;
$request->notify_url = 'http://oa.4cgame.com/index.php/Index/index.html'; // 支付后通知地址（作为支付成功回调，这个可靠）
//$request->return_url = 'http://oa.4cgame.com/index.php/Index/index.html'; // 支付后跳转返回地址
$request->businessParams->out_trade_no = 'test' . mt_rand(10000000,99999999); // 商户订单号
$request->businessParams->total_amount = 0.01; // 价格
$request->businessParams->subject = '小米手机9黑色陶瓷尊享版'; // 商品标题

$url=$pay->redirectExecute($request,true,true);
echo($url);
//var_dump($data);
