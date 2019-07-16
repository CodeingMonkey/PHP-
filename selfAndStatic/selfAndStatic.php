<?php
/**
 * Created by PhpStorm.
 * User: woniu
 * Date: 2019-07-15
 * Time: 23:27
 */

class A
{
    static $a = 'Class A';

    static function getName()
    {
        /**
         * self指向了当前被调用方法的类
         */
        return self::$a . PHP_EOL;
    }

    static function getRealName()
    {
        /**
         * static指向调用当前方法的类
         */
        return static::$a . PHP_EOL;
    }
}

class B extends A
{
    static $a = "Class B";
}

$obj = new B();
//echo 'Class B is' . B::getName();
//echo 'Class A is' . A::getName();

echo 'Class B is：' . B::getRealName();
echo 'Class A is：' . A::getRealName();
