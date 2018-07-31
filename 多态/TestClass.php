<?php

/**
 * Class Father
 * 本例中虽然不同$son和$daughter传入test方法时得到的结果不同，但是$son和$daughter本质上不是同一类对象
 * 虽然他们都继承Father类，但是他们只是继承关系，$son和$daughter不能向上转换变成Father类的实例
 * 所以不算实现了多态
 */
class Father
{
    /**
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function echoInfo()
    {
        echo 'father';
    }
}

/**
 * Class Son
 */
class Son extends Father
{
    /**
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function echoInfo()
    {
        echo 'son';
    }
}

/**
 * Class Daughter
 */
class Daughter extends Father
{
    /**
     * Administrator lirongsheng
     * 2018/7/31
     */
    public function echoInfo()
    {
        echo 'daughter';
    }
}

/**
 * @param $obj
 * Administrator lirongsheng
 * 2018/7/31
 */
function test($obj)
{
    $obj->echoInfo();
}

$son = new Son();
$daughter = new Daughter();

test($son);
echo '<br>';
test($daughter);