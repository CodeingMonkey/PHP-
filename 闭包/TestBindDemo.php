<?php
class TestBindDemo {
    private static $sfoo = 1;
    private $ifoo = 2;
}

class Test
{
    private static $number = 10;
}

$cl1 = static function() {
    /**
     * 返回对象所属类名
     * 当get_class写在类里的时候，参数可以省略
     */
    return get_class();
};
$cl2 = function() {
    return $this->ifoo;
};

/**
 * 相当于在类里面加了一个静态方法,第二个参数决定的
 * 方法加载那个类里，是第三个参数决定的
 */
$bcl1 = Closure::bind($cl1, null, 'TestBindDemo');

/**
 * 相当于在类里面加了一个成员方法
 */
$bcl2 = Closure::bind($cl2, new TestBindDemo(), 'TestBindDemo');
echo $bcl1();
echo '<br>';

echo $bcl2();
echo '<br>';
