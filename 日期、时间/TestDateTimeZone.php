<?php

/**
 * 实例化DateTimeZone的时候，设置时区搭配DateTime类使用
 */
$testDateTimeZone = new DateTimeZone('Asia/shanghai');

/**
 * 获取时区名称
 */
$timezone = $testDateTimeZone->getName();

