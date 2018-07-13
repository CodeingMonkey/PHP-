<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/13
 * Time: 11:27
 * 当前例子应该更能体现面向对象的思想（字符串当成一个对象去处理），当然也可以对字符串分割，然后foreach循环数组
 */
class ObjectIterator implements Iterator {

    private $string;

    /**
     * ObjectIterator constructor.
     * @param $string
     * 构造方法将字符串转换成数组
     */
    public function __construct($string)
    {
        $this->string = $this->strToArray($string);
    }
    private function strToArray($string,$l=0) {

        if ($l > 0) {
            $ret = array();
            $len = mb_strlen($string, "UTF-8");
            for ($i = 0; $i < $len; $i += $l) {
                $ret[] = mb_substr($string, $i, $l, "UTF-8");
            }
            return $ret;
        }
        return preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
    }

    /**
     * Administrator lirongsheng
     * 2018/7/13
     * 实现迭代器的各种方法
     */

    public function current()
    {
        return current($this->string);
    }

    public function next()
    {
        return next($this->string);
    }

    public function key()
    {
        key($this->string);
    }

    public function valid()
    {
        if(key($this->string) === null) {
            return false;
        } else {
            return true;
        }
    }

    public function rewind()
    {
        reset($this->string);
    }
}

$string = new ObjectIterator('这个是什么213jdjlf');

foreach ($string as $k => $v) {
    echo $v;
    echo '<br>';
}