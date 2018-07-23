<?php

class TestException
{
    public function exception($e)
    {
        echo $e->getMessage(). 'TestException';
        echo '<br>';
    }
}

/**
 * 注册异常处理程序，set_exception_handler的参数是一个闭包
 */
set_exception_handler(function (Exception $e) {
   echo $e->getMessage(). 'anonymous';
   echo '<br>';
});

/**
 * 注册异常处理程序，此时参数是TestException的一个方法
 */
set_exception_handler(array((new TestException()), 'exception'));

throw new \Exception('debug');

/**
 * 还原成之前的异常处理程序（本例中默认没有对异常进行处理）
 */
restore_exception_handler();

throw new \Exception('test');

