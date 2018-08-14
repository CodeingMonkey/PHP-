<?php
namespace TestNameSpace;
/**
 * __FILE__文件的完整路径和文件名
 */
$file_info = __FILE__;
print_r($file_info);
echo '<br>';

/**
 * __LINE__文件中的当前行号
 */
$line = __LINE__;
print_r($line);
echo '<br>';

/**
 * 文件所在的目录，等价于dirname(__FILE__)
 */
$dir = __DIR__;
print_r($dir);
echo '<br>';

function test()
{
    /**
     * 函数被定义时的名字
     */
    $function = __FUNCTION__;
    return $function;
}

echo test();
echo '<br>';

class  Test
{
    /**
     * 使用trait
     */
    use TestTrait;
    public function getClassName()
    {
        /**
         * 获取类被定义时的名称
         */
        $class = __CLASS__;
        echo $class;
        echo '<br>';

        /**
         * 获取类的方法名
         * 返回结果参考：Test::getClassName
         */
        $method = __METHOD__;
        echo $method;
        echo '<br>';

        $this->getTraitName();
    }
}

trait TestTrait
{
    public function getTraitName()
    {
        /**
         * 获取trait的名字
         */
        $trait_name = __TRAIT__;
        echo $trait_name;
        echo '<br>';
    }
}

(new Test())->getClassName();

/**
 * 获取命名空间
 */
$namespace = __NAMESPACE__;
echo $namespace;
echo '<br>';
