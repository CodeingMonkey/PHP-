<?php

class A {

    private $val;

    /**
     * A constructor.
     * @param $val
     * 构造方法
     */
    function __construct($val) {
        $this->val = $val;
    }

    /**
     * @return string
     * Administrator lirongsheng
     * 2018/7/16
     * 定义一个测试的私有方法
     */
    private function test()
    {
        return 'debug' . $this->val;
    }

    /**
     * @return Closure
     * Administrator lirongsheng
     * 2018/7/16
     * 闭包里面调用private和protected方法
     */
    public function getClosure() {
        return function() {
            return $this->test();
        };
    }
}

class B
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }


    /**
     * @return string
     * Administrator lirongsheng
     * 2018/7/16
     * 定义一个测试的私有方法
     */
    private function test()
    {
        return 'test' . $this->value;
    }

    /**
     * @return Closure
     * Administrator lirongsheng
     * 2018/7/16
     */
    public function getClosure() {
        return function() {
            return $this->test();
        };
    }
}


$ob1 = new A(1);
$ob2 = new B(2);

$cl = $ob1->getClosure();
echo $cl();
echo '<br>';

/**
 * bindTo方法将闭包绑定到另一个对象上
 * 如果绑定到另一个类的实例化对象上，需要注意方法的权限
 * 本例中B类的test方法如果没有指定类作用域的情况。是private方法就会报错，如果是public就是可以访问的
 * 提问：为什么绑定A的时候，没有指定作用域却不会报错
 */
$cl = $cl->bindTo($ob2, B::class);
echo $cl();
echo '<br>';
