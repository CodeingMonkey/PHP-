<?php

$url = '127.0.0.1';
$port = '9000';

/**
 * 创建一个socket
 * domain决定了socket使用IPV4协议
 * type决定了socket使用可靠的全双工连接
 * protocol决定了socket使用TCP协议
 */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die('create socket fail');

/**
 * socket设置为非阻塞
 */
socket_set_block($socket) or die('设置非阻塞失败');

/**
 * 创建的socket绑定到对应的IP地址和端口
 */
socket_bind($socket, $url, $port) or die('socket绑定失败');

/**
 * 监听socket
 */
socket_listen($socket, 4) or die('监听socket失败');

/**
 * 接收客户端传来的信息
 */
$accept_resource = socket_accept($socket);

/**
 * 读取数据
 */
$message = socket_read($accept_resource, 1024);
echo $message;

/**
 * 向socket中写入数据
 */

socket_write($accept_resource, 'success', strlen('success'));

/**
 * 关闭socket
 */
socket_close($accept_resource);
socket_close($socket);




