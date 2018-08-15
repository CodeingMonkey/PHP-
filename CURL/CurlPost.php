<?php

$url = 'http://localhost:4000/test.php';
$data = ['debug', 'test'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

/**
 * 设置收到的数据以文件流的形式返回
 */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

/**
 * 设置curl为post请求
 */
curl_setopt($ch, CURLOPT_POST, 1);
/**
 * 设置curl的post的数据
 */
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

$res = curl_exec($ch);

/**
 * 关闭curl
 */
curl_close($ch);

echo $res;