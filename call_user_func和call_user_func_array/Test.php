<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/17
 * Time: 15:24
 */
class Test
{
    /**
     * @param $value
     * Administrator lirongsheng
     * 2018/7/17
     */
    public static function index(&$value)
    {
        $value = 'debug';
    }
}

$value = 'rongsheng';
/**
 * 这种方式是错误的，call_user_func回调参数不能传引用
 */
call_user_func(array(Test::class, 'index'), $value);

/**
 * call_user_func_array是可以传递引用的
 */
call_user_func_array(array(Test::class, 'index'), [&$value]);
