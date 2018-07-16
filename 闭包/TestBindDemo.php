<?php
class TestBindDemo {
    private static $sfoo = 1;
    private $ifoo = 2;
}
$cl1 = static function() {
    return TestBindDemo::$sfoo;
};
$cl2 = function() {
    return $this->ifoo;
};

/**
 * 相当于在类里面加了一个静态方法,第二个参数决定的
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
