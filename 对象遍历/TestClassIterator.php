<?php
class TestClassIterator implements Iterator
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

$values = array(1,2,3);
$it = new TestClassIterator($values);

foreach ($it as $a => $b) {
    print "$a: $b<br>";
}