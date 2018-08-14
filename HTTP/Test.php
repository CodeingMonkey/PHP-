<?php

$url = 'http://www.baidu.com';
//$url = 'http://bestpp.com';

/**
 * 取得服务器响应一个请求所发送的所有标头
 * 两个参数，第一个参数是请求
 * 第二个参数如果设置为1，get_headers会解析相应的信息并设定数组的键名
 *
[
"HTTP/1.0 200 OK",
"Accept-Ranges: bytes",
"Cache-Control: no-cache",
"Content-Length: 14615",
"Content-Type: text/html",
"Date: Tue, 14 Aug 2018 09:31:07 GMT",
"Etag: "5b56b4a8-3917"",
"Last-Modified: Tue, 24 Jul 2018 05:10:00 GMT",
"P3p: CP=" OTI DSP COR IVA OUR IND COM "",
"Pragma: no-cache",
"Server: BWS/1.1",
"Set-Cookie: BAIDUID=B02651FE8B974C4213E2B4CB19EB77A8:FG=1; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com",
"Set-Cookie: BIDUPSID=B02651FE8B974C4213E2B4CB19EB77A8; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com",
"Set-Cookie: PSTM=1534239067; expires=Thu, 31-Dec-37 23:55:55 GMT; max-age=2147483647; path=/; domain=.baidu.com",
"Vary: Accept-Encoding",
"X-Ua-Compatible: IE=Edge,chrome=1",
]
 */
//$res = get_headers($url);
$html = file_get_contents($url);

/**
 * file_get_contents/fopen/file/readfile等函数读取URL的时候，会创建一个$http_response_header变量保存HTTP响应的包头
 * $http_response_header保存数据和get_headers($url)结果一致
 */
print_r($http_response_header);
echo '<br>';

$fp = fopen($url, 'r');

/**
 * 使用fopen等函数打开的数据流信息可以用stream_get_meta_data获取
 *  从封装协议文件指针中获取报头/元数据
 */
print_r(stream_get_meta_data($fp));
echo '<br>';

fclose($fp);

