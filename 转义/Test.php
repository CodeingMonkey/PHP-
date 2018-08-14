<?php

$text = "<p>Test</p><!--Comment --><a href='#fragment'>debug</a> <b>asd</b>";

/**
 * strip_tags用户去除字符串的HTML和PHP标记
 * 函数有两个参数，第二个参数是允许的字符列表，测试默认值应该是所有标签都不会被通过
 */
echo strip_tags($text);

echo '<br>';

echo strip_tags($text, '<p><a><b>');

$str = "ads\asd";

echo '<br>';

echo $str;

echo '<br>';

/**
 * 返回一个字符串，该方法会在某些字符前加上\
 * 字符包括（',",\,NUL）
 */
echo addslashes($str);