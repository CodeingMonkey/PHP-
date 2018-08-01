<?php
/**
 * 本例中通过反射实现动态代理
 */

/**
 * Class Mysql
 */
class Mysql
{
    /**
     * @param $db
     * Administrator lirongsheng
     * 2018/8/1
     */
    public function connect($db)
    {
        echo "连接到数据库$db[0]";
        echo '<br>';
    }
}

/**
 * Class SqlProxy
 */
class SqlProxy
{
    /**
     * @var
     */
    private $target;

    /**
     * SqlProxy constructor.
     * @param $className
     */
    public function __construct($className)
    {
        $this->target[] = new $className();
    }

    /**
     * @param $name
     * @param $arguments
     * Administrator lirongsheng
     * 2018/8/1
     */
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        foreach ($this->target as $item) {
            $reflect = new ReflectionObject($item);
            /**
             * 返回一个ReflectionMethod实例化（ReflectionMethod类报告了一个方法的有关信息）
             */
            if ($method = $reflect->getMethod($name)) {
                /**
                 * 判断方法是public且不是抽象方法
                 */
                if ($method->isPublic() && !($method->isAbstract())) {
                    echo '方法前拦截';
                    echo '<br>';
                    /**
                     * 调用对应的反射函数（本例中是调用MySQL类的connect方）
                     */
                    $method->invoke($item, $arguments);
                    echo '方法后拦截';
                    echo '<br>';
                }
            }
        }
    }
}

$test = new SqlProxy('mysql');
/**
 * 调用SqlProxy中不存在的方法，会执行SQLProxy的__call方法
 */
$test->connect('member');
