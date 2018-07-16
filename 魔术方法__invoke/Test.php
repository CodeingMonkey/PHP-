<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16
 * Time: 10:57
 */
class Test {

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        var_dump('debug');
        die();
    }
}

$test = new Test();
/**
 * 尝试使用调用函数的方式调用对象的时候，就会触发__invoke魔术方法
 */
$test();

