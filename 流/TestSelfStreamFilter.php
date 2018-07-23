<?php

/**
 * Class TestSelfStreamFilter
 * php流将数据分成按次序排列的桶，一个桶中的数据量是固定的
 * 流过滤器一次能接收并处理一个或多个桶，一定时间内，流过滤器接收到的桶叫做桶队列
 */
class TestSelfStreamFilter extends php_user_filter
{

    /**
     * @param resource $in 接收到的桶队列
     * @param resource $out 处理好的桶队列
     * @param int $consumed 处理的字节数
     * @param bool $closing 是队列中最后一个桶吗
     * @return int
     * Administrator lirongsheng
     * 2018/7/23
     */
    public function filter($in, $out, &$consumed, $closing)
    {
        $words = ['debug', 'dirt', 'grease'];
        $wordData = [];

        foreach ($words as $word) {
            /**
             * 用给定的值填充数组
             * 本例中用*填充数组，填充mb_strlen($word)个元素，数组的键名从start_index开始
             * start_index如果是负数的话，则数组键从0开始，最后一个元素的键是start_index
             */
            $replacement = array_fill(0, mb_strlen($word), '*');

            $wordData[$word] = implode('', $replacement);
        }

        $bad = array_keys($wordData);
        $good = array_values($wordData);

        /**
         * 迭代流来的桶队列中的每个桶,就是自己要做的过滤器处理操作
         */
        while ($bucket = stream_bucket_make_writeable($in)) {
            /**
             * 将脏字替换成目标文字
             * str_replace：子字符串替换
             * bad和good可以是数组或者字符串
             * bad和good都是数组的话，会在两者之间做映射，如果good长度小于bad，则替换成空字符串，$bucket->data如果是数组的话，就是遍历数组做替换操作
             * str_replace还有第四个参数count，如果count被指定的话，count代表发生替换的次数
             */
            $bucket->data = str_replace($bad, $good, $bucket->data);

            /**
             * 增加已处理的数据量
             * 如果不要求得到总共处理数据量这个操作可以不写
             */
            $consumed += $bucket->datalen;

            /**
             * 将桶流向下游的队列中
             */
            stream_bucket_append($out, $bucket);
        }

        return PSFS_PASS_ON;
    }
}

/**
 * 注册过滤器,第一参数是自定义的过滤器名，第二个参数是自定义过滤器类名
 */
stream_filter_register('test_self_stream_filter', 'TestSelfStreamFilter');

/**
 * 打开文件，只读方式
 */
$handle = fopen('./test.txt', 'rb');
/**
 * 加载自定义过滤器
 */
stream_filter_append($handle, 'test_self_stream_filter');

/**
 * 判断是否读取到文件末尾
 */
while (feof($handle) !== true) {
    /**
     * 每次读取一行
     */
    echo fgets($handle);
    echo '<br>';
}

/**
 * 关闭文件
 */
fclose($handle);







