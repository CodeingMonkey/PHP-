<?php

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

/**
 * 设置socket的控制选项
 * 本例中设置socket发送超时1s、接收超时3s
 * optname参数SO_SNDTIMEO表示发送资源超时时间、SO_RCVTIMEO表示接收资源超时时间
 * 第四个参数，sec表示超时最大时间sec是秒为单位、usec是微秒单位
 */
socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, ['sec' =>1, 'usec' => 0]);
socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, ['sec' => 3, 'usec'=>0]);

/**
 * 连接服务端的socket
 */
socket_connect($socket, '127.0.0.1', 9000) or die('连接服务端socket失败');

$message = 'debug';

/**
 * 向socket中写入数据
 */
socket_write($socket, $message, strlen($message));

/**
 * 接收服务端返回的数据
 */
$receive_message = socket_read($socket, 1024);

echo $receive_message;

/**
 * 关闭socket
 */
socket_close($socket);

