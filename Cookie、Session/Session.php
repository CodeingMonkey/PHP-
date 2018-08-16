<?php

/**
 * session是通过sessionid判断客户端的（如果是文件形式存储session。session文件名为sess_sessionID）
 * 如果没有设置session的生命周期，sessionID存储在内存中，关闭浏览器之后该ID自动注销
 */

/**
 * session_start必须在操作session之前执行，不然无法操作session
 */
session_start();

/**
 * PHP默认存储session的方式是file。session.save_handler=files
 * 当以文件形式存储session时，因为每个session就是一个文件，当一个目录下文件过多时，磁盘读取文件速度会变慢
 * 所以session应该分目录存放
 * PHP.ini配置文件有：session.save_path = "N;MODE;/path"
 * N表示设置目录级数、MODE表示目录权限、/path表示session文件存放的根目录路径
 * 当采用多级目录存放session文件的时候，子目录需要自己去创建
 * 分级目录存放的session，PHP不会自动回收session
 */
$_SESSION['username'] = 'admin';


/**
 * 回收session、session回收是被动的，为了保证session的及时回收。可以修改php.ini的session.gc_divisor参数提高回收效率
 */
unset($_SESSION['username']);


echo $_SESSION['username'];
echo '<br>';

echo 'test session save_path';

