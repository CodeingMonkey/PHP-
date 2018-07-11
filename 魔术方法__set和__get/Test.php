<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/11
 * Time: 15:13
 */

class Test {
    private $name = 'lrs';
    protected $email = '******@qq.com';
    public $address = 'hangzhou';

    /**
     * @param $name
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/11
     * 允许在类外访问类的的私有属性或者受保护属性
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

    /**
     * @param $name
     * @param $value
     * Administrator lirongsheng
     * 2018/7/11
     * __set方法允许在类外实现对私有变量或者受保护的变量的赋值
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name = $value;
    }

}

$test = new Test();
$test->address = 'zhejiang';
echo $test->address;

$test->name = 'rongsheng';
echo $test->name;

