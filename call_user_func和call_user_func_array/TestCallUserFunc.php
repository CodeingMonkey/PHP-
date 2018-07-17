<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17
 * Time: 14:51
 */
class TestCallUserFunc
{

    public function __construct()
    {
        echo 'debug';
        echo '<br>';
    }
    /**
     * @param $key
     * @param $value
     * Administrator lirongsheng
     * 2018/7/17
     */
    public static function index($key, $value)
    {
        echo $key;
        echo '<br>';
        echo $value;
        die();
    }

    /**
     * @param $key
     * @param $value
     * Administrator lirongsheng
     * 2018/7/17
     */
    public function test($key, $value)
    {
        echo $key;
        echo '<br>';
        echo $value;
        die();
    }
}

/**
 * 直接实例化对象，肯定会走构造方法
 */
(new TestCallUserFunc())->test('admin', 'password');

/**
 * 调用类的静态方法，没有调用构造方法
 */
TestCallUserFunc::index('admin', 'password');

/**
 * call_user_func方法既可以调用类的静态方法也可以调用非静态方法
 * 没有经过类的构造方法
 */
call_user_func(array(TestCallUserFunc::class, 'index'), 'admin', 'password');

/**
 * call_user_func_array，和call_user_func方法的不同，回调函数的参数，表现为参数数组
 */
call_user_func_array(array('TestCallUserFunc', 'index'), ['admin', 'password']);

