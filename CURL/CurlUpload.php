<?php

$url = 'http://localhost:4000/test.php';

/**
 * 上传一个文件的时候，只需要把文件路径当做一个POST变量即可，但是需要在文件路径前加上@
 */
$data = [
    'upload' => '@./test.png'
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS ,$data);

$res = curl_exec($ch);

echo $res;