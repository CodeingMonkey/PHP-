<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/11
 * Time: 15:08
 */

class Test {
    /**
     * @param $name
     * @param $arguments
     * Administrator lirongsheng
     * 2018/7/11
     * 调用类的不存在或者受保护的方法的时候，__call方法会被调用
     */
    public function __call($name, $arguments)
    {
       $this->$name($arguments);

    }


}

$test = new Test();
$test->runTest('lrs');