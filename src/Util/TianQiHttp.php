<?php
namespace TianQi\PaySDK\Util;

use TianQi\PaySDK\Util\TianQiHttp\Handler\Curl;

abstract class TianQiHttp
{
    /**
     * 默认处理器类
     * @var string
     */
    private static $defaultHandler = 'TianQi\Util\TianQiHttp\Handler\Curl';

    private static $attributes = [];

    /**
     * 设置默认处理器类
     * @param string $class
     * @return void
     */
    public static function setDefaultHandler($class)
    {
        static::$defaultHandler = $class;
    }

    /**
     * 获取默认处理器类
     * @return string
     */
    public static function getDefaultHandler()
    {
        return static::$defaultHandler;
    }

    /**
     * 发送请求并获取结果
     * @param \TianQi\Util\TianQiHttp\Http\Request $request
     * @return \TianQi\Util\TianQiHttp\Http\Response
     */
    public static function send($request, $handlerClass = null)
    {
        if(null === $handlerClass)
        {
            $handlerClass = static::$defaultHandler;
        }
        $handler = new $handlerClass();
        $time = microtime(true);
        foreach(static::$attributes as $name => $value)
        {
            if(null === $request->getAttribute($name))
            {
                $request = $request->withAttribute($name, $value);
            }
        }
        $handler->send($request);
        $response = $handler->recv();
        $response = $response->withTotalTime(microtime(true) - $time);
        return $response;
    }

    /**
     * 获取所有全局属性
     * @return array
     */
    public static function getAttributes()
	{
		return static::$attributes;
	}

    /**
     * 获取全局属性值
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public static function getAttribute($name, $default = null)
	{
        if(array_key_exists($name, static::$attributes))
        {
            return static::$attributes[$name];
        }
        else
        {
            return $default;
        }
	}

    /**
     * 设置全局属性值
     * @param string $name
     * @param mixed $value
     * @return mixed
     */
    public static function setAttribute($name, $value)
	{
        static::$attributes[$name] = $value;
	}

}