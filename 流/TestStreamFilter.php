<?php

/**
 * 定义开始时间
 */
$datetime = new DateTime();

/**
 * 得到一个时间周期的对象，每次向前一天
 */
$dateInterval = DateInterval::createFromDateString('-1 day');

/**
 * 定义DatePeriod循环次数
 */
$end =30;

/**
 * 得到一个DatePeriod实例，本质是一个迭代器
 */
$datePeriod = new DatePeriod($datetime, $dateInterval, $end);

foreach ($datePeriod as $item) {
    /**
     * 指定文件
     */
    $file = 'http://lrspp.com'. $item->format('Y-m-d'). 'log.bzz';

    /**
     * 判断文件是否存在
     */
    if (file_exists($file)) {
        /**
         * 打开一个文件
         */
        $handle = fopen($file, 'rb');

        /**
         * 附加过滤器
         */
        stream_filter_append($handle, 'bzip2.decompress');

        while (feof($handle) !== true) {
            /**
             * 读取解压后的日志文件内容，fgets的第二个参数没有指定，每次指定一行
             */
            $line = fgets($handle);

            /**
             * 判断读取到的内容中有lrspp.com
             */
            if (strpos($line, 'lrspp.com') !== false) {

                /**
                 * 将符合条件的内容输出到命令行
                 */
                fwrite(STDOUT, $line);
            }
        }
        /**
         * 关闭文件
         */
        fclose($handle);
    }
}



