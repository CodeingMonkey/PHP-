<?php
function xrange($start, $limit, $step = 1) {
    /**
     * start<limit的时候，step必须为正数，否则死循环了
     */
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            /**
             * 每次产出一个值
             */
            if ($i == 5) {
                continue;
            }
            yield $i;
        }
    } else {
        /**
         * 同理start>limit的时候，step必须为负数，否则死循环
         */
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            /**
             * 每次产出一个值
             */
            yield $i;
        }
    }
}

/*
 * 注意下面range()和xrange()输出的结果是一样的。
 */
echo "range的表现：";
foreach (range(1, 9, 2) as $number) {
    echo "$number ";
}
echo '<br>';

echo "yield的表现：";
/**
 * Xrang(1,9,2)实际上是一个Generator对象
 */
foreach (xrange(1, 9, 2) as $number) {
    echo "$number ";
}

