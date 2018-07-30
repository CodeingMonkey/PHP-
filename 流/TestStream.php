<?php

/**
 * file_get_contents的参数本质上是一个流，
 * 如下：url实际上使用了HTTP协议封装的PHP流，如果不加上http协议的话，会把file_get_contents的参数当做一个文件去处理，本例中不存在这个文件
 * 流协议标识符<scheme>://<target>
 */
$res = file_get_contents('http://lrspp.com/404.html');
$res = file_get_contents('lrspp.com/404.html');

print_r($res);
echo '<br>';


/**
 * fopen打开文件或者URL，如果filename参数符合流协议标识符，将寻找对应的流协议处理器去处理
 * 如果没有明显的的流协议标识符，file_open会把filename参数当成一个file流，因为file://是PHP默认的流封装协议
 * mode参数指定了流的范文类型，r代表只读，操作二进制文件时如果没有加b标记，会出现奇怪的问题，所以默认都会mode加上b标记
 * 成功的时候返回文件指针资源，失败返回false
 */
$handle = fopen('./test.txt', 'rb');

/**
 * 将流过滤器附加到流上
 * string.toupper是PHP内置的流过滤器，作用是字母转换成大写
 */
//stream_filter_append($handle, 'string.toupper');

/**
 * 还可以使用PHP::filter流封装协议将过滤器加载在流上
 * 这种方式必须先打开PHP流
 */
$handle = fopen('php://filter/read=string.toupper/resource=./test.txt', 'rb');

/**
 * feof测试文件指针是否到了文件结束的位置，如果到了的话返回true（这时应该关闭文件），没有的话可以继续读取文件资源
 * 文件指针必须有效（不能被fclose关闭）
 */
while (feof($handle) !== true) {

    /**
     * 从文件指针中读取一行，
     * length指从handle指向的文件中读取一行并返回长度最多为length-1的字符串，碰到换行符，EOF、或者读取满足长度会自动结束
     * 没有指定length的话，默认是1024字节，新版PHP默认是读取一行
     */
    echo fgets($handle, 10);
    echo '<br>';
}

/**
 * 将handle指向的文件关闭，handle必须有效，成功返回true，失败返回false
 */
fclose($handle);

