<?php

/**
 * 忽略大小写模式
 */

$str = '<div>gG</div>';

if (preg_match('/<div>gg<\/div>/i', $str, $arr)) {
    echo '匹配成功';
    echo '<br>';
    print_r($arr);
} else {
    echo '匹配失败';
}