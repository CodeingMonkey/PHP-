<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/12
 * Time: 13:51
 */

interface Test {

    const name = 'rongsheng';

    /**
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/12
     * 方法必须是public，空方法
     */

    public function getId();
    public function getName();

}

/**
 * Class Student
 * 实现接口的类必须实现接口的所有方法
 */
class Student implements Test {
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed|string
     * Administrator lirongsheng
     * 2018/7/12
     * 重写接口的方法
     */
    public function getId()
    {
        return 'this student id is'.$this->id;
    }

    /**
     * @return string
     * Administrator lirongsheng
     * 2018/7/12
     * 重写接口方法
     */
    public function getName()
    {
        return 'this student name is'.$this->name;
    }
}

/**
 * Class Teacher
 * 实现接口的类必须实现接口的所有方法
 */
class Teacher implements Test {
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed|string
     * Administrator lirongsheng
     * 2018/7/12
     * 重写接口方法
     */
    public function getId()
    {
        return 'this teacher id is'.$this->id;
    }

    /**
     * @return string
     * Administrator lirongsheng
     * 2018/7/12
     * 重写接口方法
     */
    public function getName()
    {
        return 'this teacher name is'.$this->name;
    }
}

/**
 * Class Operate
 * 这种方式满足了接口的使用，避免了对象和对象的依赖，因为obj是
 */
class Operate {

    private $data = [];

    /**
     * @param $name
     * @return mixed
     * Administrator lirongsheng
     * 2018/7/12
     * 类外私有变量可以访问
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

    public function test($obj)
    {
        $key = $obj->getId();
        $value = $obj->getName();
        $this->data[$key] = $value;
    }
}

$test = new Operate();
$test_teacher = new Operate();
$student = new Student(1, 'lrs');
$test->test($student);
exit(json_encode($test->data));
die();

$teacher = new Teacher('2', 'lirongsheng');
$test_teacher->test($teacher);
exit(json_encode($test_teacher->data));
die();