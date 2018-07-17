<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17
 * Time: 14:27
 */
class TestAutoload
{
    /**
     * Administrator lirongsheng
     * 2018/7/17
     * 定义静态方法
     */
    public static function index()
    {
        var_dump('debug');
        die();
    }

    /**
     * Administrator lirongsheng
     * 2018/7/17
     * 定义非静态方法
     */
    public function test()
    {
        var_dump('test');
        die();
    }
}

/**
 * 注册TestAutoload的index方法到__autoload函数队列
 */
spl_autoload_register(array('TestAutoload', 'index'), true, true);

/**
 * 注册TestAutoload的test方法到__autoload函数队列
 * 和上一个spl_autoload_register不同的是，上一个注册的静态方法
 */
spl_autoload_register(array((new TestAutoload()), 'test'), true, true);

/**
 * 实例化TestAutoload对象，触发__autoload函数队列的TestAutoload的index方法
 */
$test = new DD();



