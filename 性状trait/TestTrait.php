<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13
 * Time: 9:10
 */

/**
 * Trait Test
 * 定义性状
 */
trait Test
{
    /**
     * @param $str
     * Administrator lirongsheng
     * 2018/7/13
     * 性状的非静态方法
     */
    public function show($str)
    {
        print_r($str);
    }

    /**
     * @param $str
     * Administrator lirongsheng
     * 2018/7/13
     * 性状的静态方法，可以被use该trait的类调用
     */
    public static function detail($str)
    {
        print_r($str);
        die();
    }
}

class TestTrait
{
    /**
     * 引入性状
     */
    use Test;
}


$test_trait = new TestTrait();
/**
 * 调用性状的普通方法
 */
$test_trait->show('rongsheng');

echo '<br>';

/**
 * 调用性状的静态方法
 */
TestTrait::detail('lrs');