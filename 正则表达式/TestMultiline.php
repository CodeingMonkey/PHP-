<?php

/**
 * 多行模式
 */

$str = 'this is reg
Reg
this regexp turtor,oh,reg';

if (preg_match_all('/.*reg$/mi', $str, $match)) {
    echo '匹配成功';
    echo '<br>';
    var_dump($match);
} else {
    echo '匹配失败';
}

if (preg_match_all('/^t.*/mi', $str, $match)) {
    echo '匹配成功';
    echo '<br>';
    var_dump($match);
} else {
    echo '匹配失败';
}

/**
 * 下面这段代码，source中虽然有\n但是写在单引号里，所以是作为普通字符而不是换行符存在的，则只能匹配到第一个abc
 * 第一个preg_match_all的m多行模式也不起作用
 */
$source1 = 'abc\nabcd';
$source2 = "abc\nabcd";

if (preg_match_all('/^abc/m', $source1, $match1)) {
    echo '匹配成功';
    echo '<br>';
    var_dump($match1);
    echo '<br>';
} else {
    echo '匹配失败';
}

if (preg_match_all('/^abc/m', $source2 ,$match2)) {
    echo '匹配成功';
    echo '<br>';
    var_dump($match2);
    echo '<br>';
}