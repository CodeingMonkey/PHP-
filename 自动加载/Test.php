<?php

/**
 * Class TestException
 * 定义自定义异常类
 */
class TestException extends \Exception {

}

/**
 * 自动加载方法
 */
spl_autoload_register(function ($name) {
    /**
     * 抛出异常
     */
    throw new \Exception('unable find interface ' . $name);
    /**
     * 抛出自定义异常
     */
    throw new TestException('抛出自定义异常');
});

/**
 * Class Test
 * 加载类Foo
 */
try {
    $test = new Foo();
} catch (\TestException $e) {
    /**
     * 抓取自动加载抛出的异常
     */
    exit(json_encode($e->getMessage()));
    die();
}

/**
 * Class Test
 * 自动加载接口DD
 */
class Test implements DD {

}
