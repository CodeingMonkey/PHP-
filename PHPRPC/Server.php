<?php

/**
 * 加载服务器端需要文件
 */
include './phprpc_3.0.1_php/phprpc_server.php';

class Server
{
    public function testServer()
    {
        return 'testServer';
    }

    public function index()
    {
        return 'index';
    }
}

/**
 * 实例化服务器
 */
$server = new PHPRPC_Server();
/**
 * 添加方法,添加的方法是私有方法或者protected方法时，客户端是不能直接调用的
 * add的第二个参数，如果不填使用默认值的话，客户端没法直接调用
 */
$server->add('testServer', Server::class);
$server->add('index', 'server');
/**
 * 启动服务器
 */
$server->start();

