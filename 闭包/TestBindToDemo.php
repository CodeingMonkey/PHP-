<?php

/**
 * Class TestBindToDemo
 * 每个闭包实例都可以$this获取闭包的内部状态，闭包中有两个方法__invoke和bindTo方法，
 * 闭包的默认状态没什么意义，但是可以通过bindTo方法将闭包绑定到其他对象上，这样闭包的内部状态就有了意义
 * 本例主要演示bindTo
 */

class TestBindToDemo {

    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $password;

    protected $info;

    /**
     * @param $key
     * @param $callback
     * Administrator lirongsheng
     * 2018/7/16
     * 闭包绑定到当前对象
     */
    public function test($key, $callback)
    {

        $this->info[$key] = $callback->bindTo($this);
    }

    /**
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/16
     * 输出姓名
     */
    public function getInfo()
    {
        return $this->info;
    }


}

/**
 * 初始化对象
 */
$test = new TestBindToDemo();

/**
 * 调用TestBind方法将闭包绑定到TestBind的一个属性上                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    当前对象
 */
$test->test('debug', function () {
   $this->name = 'rongsheng';
   $this->password = 'debug';
});

$info = $test->getInfo();
/**
 * 这时test对象的info属性（本例中为数组）的每个元素对应的value都是一个闭包。
 */
foreach ($info as $key => $value) {
    /**
     * for循环，闭包启用，为对象赋值
     */
    $value();
}

var_dump($test);
die();

