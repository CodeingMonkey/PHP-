<?php

/**
 * error_reporting参数设置0时，任何错误都会被屏蔽，不会让用户看到
 * error_reporting参数参考http://php.net/manual/zh/errorfunc.constants.php
 */
error_reporting(0);

$date = '2012-12-20';

/**
 * php7中ereg函数已经废弃，程序如果使用的话，会报fetal_error错误
 */
if (ereg("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $date, $regs)) {
    echo $regs[3] . $regs[2] . $regs[1];
    echo '<br>';
} else {
    echo "Invalid date format:$date";
    echo '<br>';
}

/**
 * 变量没有初始化的情况，会报notice错误
 */
if ($i > 5) {
    echo '$i 没有初始化啊';
    echo '<br>';
}

$a = array('o' =>2,4,6,8);

/**
 * php7中，数组索引是字符2时，调用数组的时候没有加引号，PHP就视为一个常量，先查找常量表，找不到再视为变量
 * 这种情况会直接报warning级别错误，PHP版本不同的话，当前情况错误级别可能不一样
 */
echo $a[o];

/**
 * 函数参数不匹配，warning级别错误
 * 函数前加上@符号，错误信息会被屏蔽
 */
$result = @array_sum($a, 3);

/**
 * 当前情况会直接报错fetal_error
 */
echo $fun();

echo '致命错误后，后面的程序不在运行';

echo '<br>';

echo 'over';