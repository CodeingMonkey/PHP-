<?php

/**
 * 抓取所有的HTML标签
 */

$reg = '/<\/?\b[^>]+>/';

$str = "abc<b>asdasd</b><html>asdasdasd</html><asdasd></asdasd>";

preg_match_all($reg, $str,$match);

print_r($match);
echo '<br>';


/**
 * 该正则表达式可以匹配空格
 */
$reg = '/^[ \t]*\n/m';





