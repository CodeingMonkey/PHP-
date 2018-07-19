<?php

/**
 * 设置时区
 */
date_default_timezone_set("Asia/shanghai");

/**
 * DateTime是一个类，继承了DateTimeInterface接口
 * 两个参数，第一参数表示想要实例化的时间，不填为默认时间，第二个参数是DateTimeZone的实例化对象
 * DateTimeZone实例化对象代表时间是对那个时区而言的
 */
$dateTimeZone = new DateTimeZone('Asia/shanghai');

$dateTime = new DateTime(null, $dateTimeZone);

/**
 * 设置时间,四个参数、小时、分钟、秒、毫秒
 */
$dateTime->setTime(14, 55, 24);

echo $dateTime->format('Y m d H:i:s');
echo '<br>';

/**
 * DateTime的静态方法 CreateFromFormat能够使用自定义的格式创建DateTime实例
 */
$datetime = DateTime::createFromFormat('M j, Y H:i:s', 'Jan 2, 2018 16:16:16');

/**
 * 实例化DateTime之后，可以重新设置时区
 */
$datetime->setTimezone(new DateTimeZone('Asia/Aqtobe'));

