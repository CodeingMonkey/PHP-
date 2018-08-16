<?php
/**
 * 引入客户端需要的文件
 */
include './phprpc_3.0.1_php/phprpc_client.php';

class Client
{
    public function testClient()
    {
        echo 'testClient';
    }
}

/**
 * 创建客户端并连接服务器端指定文件
 */
$client = new PHPRPC_Client('http://localhost/Server.php');
/**
 * 调用连接的服务器端文件的方法
 */
echo $client->testServer();

echo '<br>';
/**
 * 调用的方法，如果server端没有add加入的话，程序会报错找不到对应方法
 */
echo $client->index();
