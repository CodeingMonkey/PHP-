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
    /*public function __call($name, $arguments)
    {
       $this->$name($arguments);

    }*/

    static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        self::$name($arguments);

    }

    private function runTest($params)
    {
        var_dump($params);
    }

    private static function staticTest($params)
    {
        var_dump('debug');
        echo '<br>';
        var_dump($params);
    }


}

/*$test = new Test();
$test->runTest('lrs', 'debug');
echo '<br>';

$test->staticTest('admin', 'admin');
echo '<br>';*/

Test::runTest('lrs', 'debug');
echo '<br>';

Test::staticTest('admin', 'admin');