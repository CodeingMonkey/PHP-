<?php

/**
 * s修饰符可以是.元字符匹配换行符
 */

$str = 'this is reg
Reg
this is 
regexp turtor,oh,reg';

if (preg_match_all('/this.*?reg/s', $str, $match)) {
    echo '匹配成功';
    var_dump($match);
    echo '<br>';
} else {
    echo '匹配失败';
}