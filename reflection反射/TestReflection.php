<?php

/**
 * Class TestReflection
 */
class TestReflection
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $gender;
    /**
     * @var
     */
    private $pwd;

    /**
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function say()
    {
        echo $this->name, '\tis', $this->gender,'\r\n';
        echo '<br>';
    }

    /**
     * @param $name
     * @param $value
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        echo "Setting $name is $value";
        echo '<br>';
    }

    /**
     * @param $name
     * @return string
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (!isset($this->name)) {
            echo '未设置';
            $this->name = '正在设置';
        }

        return $this->name;
    }

    /**
     * Administrator lirongsheng
     * 2018/7/31
     */
    private function test()
    {
        echo 'test';
    }

}

$test = new TestReflection();
$test->name = 'rongsheng';
$test->gender = 'male';
$test->age = 24;
$test->pwd = 'admin';

$reflect = new ReflectionObject($test);
/**
 * 获取对象属性列表
 */
$pros = $reflect->getProperties();

foreach ($pros as $pro) {
    echo $pro->getName();
    echo '<br>';
}

/**
 * 获取对象方法列表（认为应该是类的方法列表）
 */
$methods = $reflect->getMethods();
foreach ($methods as $method) {
    echo $method->getName();
    echo '<br>';
}

/**
 * get_object_vars可以获取对象属性，但是只能获取public属性
 */
print_r(get_object_vars($test));
echo '<br>';

/**
 * 同样，get_class_methods也只能获取public方法
 */
print_r(get_class_methods(get_class($test)));
echo '<br>';

/**
 * get_class_vars也是只能获取public属性，而且应为获取的是类属性，所以属性没有对应的值
 */
print_r(get_class_vars(get_class($test)));
echo '<br>';


