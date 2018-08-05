<?php

/**
 * @param $errno 错误级别
 * @param $errstr 错误信息
 * @param $errfile 错误文件
 * @param $errline 错误发生行
 */
function test($errno, $errstr, $errfile, $errline)
{
    echo '错误级别' .$errno;
    echo '<br>';
    echo '错误信息' . $errstr;
    echo '<br>';
    echo '错误文件' . $errfile;
    echo '<br>';
    echo '错误发生行' . $errline;

}

function fetalError()
{
    echo 'program over';
}

/**
 * 注册错误处理程序，第一个参数是一个闭包（错误发生时运行的函数）
 * 第二个参数规定那个错误报告级别会执行用户自定义的错误处理函数，可选
 */
set_error_handler('test');

$a = array('o' =>2,3,4,5);

/**
 * 当前操作会报出warning级别错误
 */
echo $a[o];
echo '<br>';

/**
 * 主动抛出错误
 */
$i = 0;
if ($i == 0) {
    trigger_error('$i is zero');
}
echo '<br>';

/**
 * 可以让程序触发fetal_error错误时，最后做一些收尾操作
 * fetal_error这种错误时捕捉不到的
 * 程序中可以看到fetal_error错误执行了自定义的错误处理方法test()，依然抛出了错误
 */
register_shutdown_function('fetalError');
echo $fun();

/**
 * 恢复默认的错误处理程序
 */
restore_error_handler();