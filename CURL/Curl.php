<?php

$url = 'http://www.epower.cn/template/Home/Default/PC/Static/epower/images/huodong/20180807115247.jpg';
/**
 * 初始化
 */
$ch = curl_init();

/**
 * 设置选项，本例中只设置了URL
 */
curl_setopt($ch, CURLOPT_URL, $url);
/**
 * 设置获取的信息以文件流的形式返回
 * 不设置的话会直接输出
 */
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);

/**
 * 设置头文件的信息作为数据流输出
 */
//curl_setopt($ch, CURLOPT_HEADER, 1);

/**
 * 执行curl
 */
$res = curl_exec($ch);

/**
 * 将图片保存到本地
 */
file_put_contents('./test.jpg', $res);


/**
 *
Array
(
[url] => http://php.net/                    //资源网络地址
[content_type] => text/html; charset=utf-8  //内容编码
[http_code] => 200                          //状态码
[header_size] => 604                        //header大小
[request_size] => 46                        //请求的大小
[filetime] => -1                            //文件创建时间
[ssl_verify_result] => 0                    //SSL验证结果
[redirect_count] => 0                       //重定向次数
[total_time] => 2.73                        //请求时间
[namelookup_time] => 1.0E-6                 //DNS查询时间
[connect_time] => 0.328                     //连接时间
[pretransfer_time] => 0.328                 //准备传输消耗时间
[size_upload] => 0                          //上传数据大小
[size_download] => 39173                    //下载数据大小
[speed_download] => 14349                   //下载速率
[speed_upload] => 0                         //上传速率
[download_content_length] => -1             //下载内容长度
[upload_content_length] => -1               //上传内容长度
[starttransfer_time] => 0.655               //开始传输耗时
[redirect_time] => 0                        //重定向耗时
[redirect_url] =>                           //重定向URL
[primary_ip] => 208.43.231.9                //IP
[certinfo] => Array                         //认证信息
(
)

[primary_port] => 80
[local_ip] => 192.168.0.101
[local_port] => 53926
)
 */
$info = curl_getinfo($ch);
print_r($info);
die();

/**
 * 关闭CURL
 */
curl_close($ch);