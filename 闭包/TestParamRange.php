<?php

$message = 'debug';

/**
 * 没有 "use"的话程序会提示错误
 */
$example = function () {
    echo $message;
};
$example();
echo '<br>';

/**
 * 闭包可以从父作用域（可以理解是闭包之前的代码）继承变量，并且在闭包中使用
 * 但是使用这样的变量，必须使用use语言结构将变量传递到闭包函数中
 */
$example = function () use ($message) {
    var_dump($message);
};
$example();
echo '<br>';

/**
 * @param $arg
 * 闭包同样可以接收参数
 */
$example = function ($arg) use ($message) {
    var_dump($arg . ' ' . $message);
};
$example("hello");