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
     * Administrator lirongsheng
     * 2018/7/26
     */
    public function say()
    {
        /**
         * \t表示空格，
         * \r表示回车、\n表示换行
         * Windows下\r\n表示换行、Linux下\n表示换行
         * 多个参数之间可以直接用,分隔，输出的时候会自动将字符串组合
         * 双引号可以解释转义字符（\t、\r、\n）
         */
        echo $this->name, "\tis ", $this->gender,"\r\n";

        /**
         * 之所以<br>，因为\r\n是对HTML代码换行，浏览器对源代码换行但是对用户来说是看不出效果的
         */
        echo '<br>';
    }

}

/**
 * Class Family
 */
class Family
{
    /**
     * @var
     */
    public $people;
    /**
     * @var
     */
    public $location;

    /**
     * Family constructor.
     * @param $p
     * @param $loc
     */
    public function __construct($p, $loc)
    {
        $this->people = $p;
        $this->location = $loc;
    }
}

$number = 123;
/**
 * php的类和对象是不可分割的，如果有对象必定有对应的类和其对应
 * 由标量强制转换的object，没有类和其对应，则该object所属类是stdClass
 * 标量类型：boolean、int、String、float
 */
echo get_class((object)$number);
echo '<br>';

$student = new Person();
echo get_class($student);
echo "<br>";

$student->name = 'Tom';
$student->gender = 'male';
$student->say();

$tom = new Family($student, 'peking');
/**
 * 实例化的对象会带上对象所属的类名（放到对象来说就是指针，指向了所属类），保证了对象能够执行类的方法
 * 可以找到方法所在的代码空间（对象是属性的集合、对象并不包括方法，方法从属于类）
 */
echo serialize($student);
echo '<br>';

$student_arr = ['name' => 'Tom', 'gender' => 'male'];
echo serialize($student_arr);
echo '<br>';

print_r($tom);
echo '<br>';

/**
 * 当一个对象的属性是另一个类的实例化的时候，序列该对象的同时会对该属性也序列化
 */
echo serialize($tom);

