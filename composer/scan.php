<?php
/**
 * 使用composer的自动加载器
 */

require  'vendor/autoload.php';

/**
 * 实例化HTTP客户端
 */
$client = new \GuzzleHttp\Client();
/**
 * 打开并且读取CSV文件
 * $argv — 传递给脚本的参数数组
 * 第一个参数总是当前脚本的文件名，因此 $argv[0] 就是脚本文件名。本例中要取传来的csv所在文件路径，所以取第一个参数
 */

$csv = \League\Csv\Reader::createFromPath($argv[1]);

/**
 * 遍历CSV
 */
foreach ($csv as $csvRow) {

    try {
        /**
         * 发送HTTP请求
         */
        $httpResponse = $client->options($csvRow[0]);

        /**
         * 判断HTTP请求返回码是否大于400
         */
        if ($code = $httpResponse->getStatusCode() >= 400) {
            throw new \Exception($code);
        }

    } catch (\Exception $e) {
        /**
         * 将错误信息发送到控制台
         */
        echo $csvRow[0];
        echo '<br>';
        echo $e->getMessage();
    }
}
