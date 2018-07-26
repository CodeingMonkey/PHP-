<?php

/**
 * Class Person
 */
class Person
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $gender;
    /**
     * @var
     */
    private $age;
    /**
     * @var
     */
    protected $address;

    /**
     * Administrator lirongsheng
     * 2018/7/26
     */
    public function say()
    {
        echo 'this person name is ' . $this->name;
        echo '<br>';
        echo 'this person gender is ' . $this->gender;
    }

    /**
     * @param $name
     * @param $value
     * Administrator lirongsheng
     * 2018/7/26
     */
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name = $value;
    }

    /**
     * @param $name
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/26
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

}

$student = new Person();
$student->name = 'rongsheng';
$student->gender = 'male';
$student->age = '21';
$student->address = 'hangzhou';

/**
 * PHP的对象是用数组模拟的，所有对象转成数组的情况可以看到对象的属性
 * ???私有属性或者保护属性这种情况,前者会加上类的名字，后者会加上*
 */
//print_r((array)$student);
//die();

$str = serialize($student);
unset($student);

var_dump(unserialize($str));
