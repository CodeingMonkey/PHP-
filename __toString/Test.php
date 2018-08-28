<?php

/**
 * Class Test
 */
class Test
{
    /**
     * @var
     */
    public $user;
    /**
     * @var
     */
    public $name;

    public static $pwd;

    /**
     * Test constructor.
     * @param $user
     * @param $name
     */
    public function __construct($user, $name)
    {
        $this->user = $user;
        $this->name = $name;
    }

    /**
     * @return string
     * Administrator lirongsheng
     * 2018/7/31
     * __toString魔术方法也是一种序列化(当然你可以不用来做类序列化操作)
     */
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "当前对象的用户名是".$this->user.',昵称是'.$this->name;
    }

    public static function test()
    {
        echo 'static method';
    }
}

$test = new Test('admin', '管理员');

/**
 * PHP中echo是可以打印对象的但是PHP做了限制，只有类实现了__toString方法的时候，类的实例化对象才能echo出来
 * echo出来的具体结果会根据实现的__toString方法得出
 */
echo $test;
echo '<br>';
/**
 * 类属性声明为static，不能通过对象去调用，可以Class::Attribute调用
 */
echo $test->pwd;
echo Test::$pwd;
echo '<br>';

/**
 * 类方法声明为static，可以对象去调用也可以Class::method调用
 */
$test->test();
echo '<br>';

print_r($test);