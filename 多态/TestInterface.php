<?php

/**
 * Interface Car
 * 本例中实现了PHP意义上的多态，test方法的形参是一个接口的变量，所以$bmw_car和$benz_car可以看做同一类变量
 * 这样就是同一类变量调用相同的函数返回了不同的结果
 */
interface Car{

    /**
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function run();

}

/**
 * Class Bmw
 */
class Bmw implements Car
{
    /**
     * @var
     */
    public $speed;

    /**
     * @return mixed|void
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function run()
    {
        echo 'this car speed is 200Km/h';
    }
}

/**
 * Class Benz
 */
class Benz implements Car
{
    /**
     * @var
     */
    public $speed;

    /**
     * @return mixed|void
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function run()
    {
        echo 'this car speed is 300Km/h';
    }
}

/**
 * @param $obj
 * Administrator lirongsheng
 * 2018/7/31
 */
function test($obj)
{
    $obj->run();
}

$bmw_car = new Bmw();
$benz_car = new Benz();

test($bmw_car);
echo '<br>';
test($benz_car);
