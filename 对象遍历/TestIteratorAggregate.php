<?php

/**
 * Class TestIteratorAggregate
 * 定义一个类实现接口Iterator，重写接口的各种方法
 */
class TestIteratorAggregate implements Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->var = $array;
        }
    }

    public function rewind() {
        echo "rewinding<br>";
        reset($this->var);
    }

    public function current() {
        $var = current($this->var);
        echo "current: $var<br>";
        return $var;
    }

    public function key() {
        $var = key($this->var);
        echo "key: $var<br>";
        return $var;
    }

    public function next() {
        $var = next($this->var);
        echo "next: $var<br>";
        return $var;
    }

    public function valid() {
        $var = $this->current() !== false;
        echo "valid: {$var}<br>";

        return $var;
    }
}

/**
 * Class MyCollection
 * 有类似功能的类，都可以实现IteratorAggregate接口，实现getIterator方法
 * 可以避免多个类有同样实现Iterator的代码的重复，只需要返回实现了Iterator接口的类的对象就可以
 */
class MyCollection implements IteratorAggregate
{
    private $items = array();
    private $count = 0;

    /**
     * @return TestIteratorAggregate|Traversable
     * Administrator lirongsheng
     * 2018/7/13
     * 实现接口IteratorAggregate的方法
     */
    public function getIterator() {
        return new TestIteratorAggregate($this->items);
    }

    public function add($value) {
        $this->items[$this->count++] = $value;
    }
}

$coll = new MyCollection();
$coll->add('value 1');
$coll->add('value 2');
$coll->add('value 3');

foreach ($coll as $key => $val) {
    echo "key/value: [$key -> $val]\n\n";
}