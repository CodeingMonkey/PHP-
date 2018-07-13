<?php

/**
 * Class TestIterator
 * 迭代器
 */
class TestIterator implements Iterator {
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    /**
     * TestIterator constructor.
     * 构造方法
     */
    public function __construct() {
        $this->position = 0;
    }

    /**
     * Administrator lirongsheng
     * 2018/7/13
     * 开始一个for循环的时候，这是第一个被调用的方法，将不会在foreach循环之后被调用。（只被调用一次）
     */
    function rewind() {
        var_dump(__METHOD__);
        echo '<br>';
        $this->position = 0;
    }

    /**
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/13
     * 返回当前元素
     */
    function current() {
        var_dump(__METHOD__);
        echo '<br>';
        return $this->array[$this->position];
    }

    /**
     * @return int|mixed
     * Administrator lirongsheng
     * 2018/7/13
     * 返回当前元素的key
     */
    function key() {
        var_dump(__METHOD__);
        echo '<br>';
        return $this->position;
    }

    /**
     * Administrator lirongsheng
     * 2018/7/13
     * 移动到下一个元素
     */
    function next() {
        var_dump(__METHOD__);
        echo '<br>';
        ++$this->position;
    }

    /**
     * @return bool
     * Administrator lirongsheng
     * 2018/7/13
     * 检测当前位置是否有效，（判断当前key对应的值是否存在，不存在返回false，存在的返回true），返回false时，循环结束。
     */
    function valid() {
        var_dump(__METHOD__);
        echo '<br>';
        return isset($this->array[$this->position]);
    }
}

$it = new TestIterator();

foreach($it as $key => $value) {
    var_dump($key, $value);
    echo "\n";
}