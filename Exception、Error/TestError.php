<?php

require './vendor/autoload.php';

/**
 * 引入whoops组件，良好的异常处理页面
 * 触发了PHP错误或者遇到未被捕获的异常就会触发whoops组件
 */
$whoops = new Whoops\Run();
$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
$whoops->register();

try {
    echo 2 / 0;
} catch (\Exception $e) {

    /**
     * 使用monolog记录日志,实例化日志记录器接口
     */
    $logger = new \Monolog\Logger('monolog');

    /**
     * 设置格式，去除日志最后的[]
     */
    $handler = new \Monolog\Handler\StreamHandler('./test.log', \Monolog\Logger::WARNING);
    $format = new \Monolog\Formatter\LineFormatter(null, null, false, true);

    /**
     * 设置日志记录位置和什么级别开始记录日志
     */
    $handler->setFormatter($format);

    $logger->pushHandler($handler);
    /**
     * 将异常信息存入日志文件
     */
    $logger->addError('monolog记录日志', ['code' => 10028, 'message' => $e->getMessage()]);

    $logger->log(\Monolog\Logger::WARNING, 'monolog记录日志', ['code' => 10028, 'message' => $e->getMessage()]);
}

/**
 * 测试whoops组件
 */
echo 2/0;
