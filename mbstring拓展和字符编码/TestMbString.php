<?php

$str = 'debug';
$mbStr = '测试';

/**
 * 英文是单字节字符（在ASCII字符集里），所以strlen和mb_strlen结果一样
 */
echo strlen($str);
echo '<br>';

echo mb_strlen($str);
echo '<br>';

/**
 * 中文是多字节字符，每个字符占三个字节，所以使用strlen结果是6
 */
echo strlen($mbStr);
echo '<br>';

/**
 * mb_strlen是mbString拓展提供的函数，可以处理多字节字符，结果是2
 */
echo mb_strlen($mbStr);
echo '<br>';

/**
 * 检测字符的编码
 */
echo mb_detect_encoding($mbStr);
echo '<br>';

/**
 * mb拓展转换字符编码
 */
mb_convert_encoding($mbStr, 'GBK', 'UTF-8');
/**
 * 检测字符的编码
 */
echo mb_detect_encoding($mbStr);
echo '<br>';

echo strlen($mbStr);

