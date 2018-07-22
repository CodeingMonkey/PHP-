<?php

/**
 * DatePeriod表示一个生命周期
 * DatePeriod的实例本质上就是一个迭代器，每次循环产出一个DateTime实例
 */


/**
 * DatePeriod的构造方法四个参数
 * @param DateTimeInterface $start 表示迭代开始的日期和时间
 * @param DateInterval $interval   表示到下一个日期和时间的间隔（与下一个日期和时间的差）
 * @param DateTimeInterface $end   表示迭代的总次数
 * @param  设置为DatePeriod::EXCLUDE_START_DATE   可以去除开始时间和结束时间
 */

$start = new DateTime();
/**
 * 直接实例化DateInterval实例,构造函数的参数中的整数不能为负数
 */
$interval = new DateInterval('P1D');

/**
 * 通过createFromDateString方法生成一个DateInterval实例
 */
$interval = DateInterval::createFromDateString('-1 day');
$end = 10;

/**
 * 本质上就是一个迭代器,DatePeriod实现了Traversable接口
 * 实现了Traversable接口的类不需要实现Iterator接口或者IteratorAggregate接口就可以用foreach遍历
 */
$datePeriod = new DatePeriod($start, $interval, $end, DatePeriod::EXCLUDE_START_DATE);


foreach ($datePeriod as $item) {
    /**
     * 格式化输出
     */
    echo $item->format('Y m d');
    echo '<br>';
}
