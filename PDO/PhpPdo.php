<?php

/**
 * @param $sql 执行的sql语句
 * @param $location 绑定参数的为位置
 * @param $var 需要绑定参数
 * @param $type 绑定参数的类型
 */
function bindParam(&$sql, $location, $var, $type)
{
    switch ($type) {
        default:
            break;
        case 'STRING':
            $var = addslashes($var);

            //SQL语句中字符串必须插入单引号
            $var = "'" . $var . "'";
            break;
        case 'INT':
            $var = (int)$var;
            break;
    }
    /**
     * 获取对应?所在的位置
     */
    $pos = strpos($sql, '?');


    //字符串组成分为?前面的部分 ? 和?后面的部分拼接起来
    $sql = substr($sql, 0, $pos) . $var . substr($sql, $pos+1);
}

$uid = 'good';
$pwd = "123456 or '1' = '1'";

$sql = "select * from table where uid = ? AND pwd = ?";

bindParam($sql, 1, $uid, 'INT');
echo $sql;
echo '<br>';

bindParam($sql, 2, $pwd, 'STRING');
echo $sql;
echo '<br>';