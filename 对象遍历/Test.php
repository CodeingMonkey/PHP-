<?php

/**
 * Class MyClass
 * 实现类的遍历
 */
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    /**
     * Administrator lirongsheng
     * 2018/7/13
     * 类内可以打印类的protected和private属性
     */
    function iterateVisible() {
        echo "MyClass::iterateVisible:debug";
        echo '<br>';
        foreach($this as $key => $value) {
            print "$key => $value";
            echo '<br>';

        }
    }

}

$class = new MyClass();

/**
 * 类外遍历，只能打印类的public属性
 */
foreach($class as $key => $value) {
    print "$key => $value";
    echo '<br>';

}
echo '<br>';

$class->iterateVisible();