<?php

class A
{

    private $val;

    /**
     * A constructor.
     * @param $val
     * 构造方法
     */
    function __construct($val)
    {
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
    public function getClosure()
    {
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
}


$ob1 = new A(10);
$ob2 = new B(22);

/**
 * $cl是一个闭包
 */
$cl = $ob1->getClosure();
echo $cl();
echo '<br>';

/**
 * bindTo方法将闭包绑定到另一个对象上
 * 如果绑定到另一个类的实例化对象上，需要注意方法的权限
 * 本例中B类的test方法如果没有指定类作用域的情况。是private方法就会报错，如果是public就是可以访问的
 * 提问：为什么绑定A的时候，没有指定作用域却不会报错
 * 回答：cl本身是A的一个方法返回的一个闭包（$cl指向的是A）所以即便再绑定A的新对象，newScope不传的话默认也是可以运行的
 * 但是cl当前状态是不能访问B类的任何方法，所以需要重新绑定到B上
 */
print_r($cl);echo '<br>';

$cl = $cl->bindTo($ob2, B::class);
print_r($cl);echo '<br>';

echo $cl();
echo '<br>';
