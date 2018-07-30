<?php

/**
 * 表示一个时间周期的类，时间周期：长度固定的时间段或者相对而言的时间段
 * 搭配DateTime实例使用，DateTime的add给DateTime对象增加固定时间，sub减少固定时间段
 */

/**
 * 构造函数的参数格式
 * 字母P开头后面跟着一个整数，最后一个周期标志符用来限定前面的整数
 * 周期标志符：Y、M、D、W、H、M、S
 * DateInterval的参数必须要有日期日期的整数可以为0，日期和时间之间加上字母T
 */
$dateInterval = new DateInterval('P0DT2H');

/**
 * 设置时区
 */
$dateTimeZone = new DateTimeZone('Asia/shanghai');

/**
 * 实例化时间对象
 */
$dateTime = new DateTime(null, $dateTimeZone);

echo $dateTime->format('Y m d H:i:s');
echo '<br>';

$dateTime->add($dateInterval);
echo $dateTime->format('Y m d H:i:s');
echo '<br>';

$dateTime->sub($dateInterval);
echo $dateTime->format('Y m d H:i:s');
echo '<br>';
