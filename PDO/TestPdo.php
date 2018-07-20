<?php


try {
    /**
     * PDO实例的作用是将PHP和数据库连接起来
     * PDO实例化有四个参数
     * 第一个参数dsn（数据源名称），有数据库驱动名称:、主机或者IP地址、数据库名称、端口号、数据库字符集组成。组成dsn的各个参数之间;分隔
     * 第二个参数数据库用户名
     * 第三个参数数据库密码
     * 第四个参数 使用的驱动的连接配置，是一个数组，基本不会使用
     * sprintf把格式化的字符串写入变量中
     */
    $dsn = sprintf('mysql:host=%s;dbname=%s;port=%d;charset=%s', '127.0.0.1', 'world', 3306, 'utf8');
    $pdo = new PDO(
        $dsn,
        'root',
        '123456'
    );
} catch (\PDOException $e) {
    var_dump($e->getMessage());
    die();
}

echo '连接数据库成功';
echo '<br>';

/**
 * sql没有直接使用来自HTTP请求的数据，使用了具名占位符
 */
$sql = 'select * from userinfo where id = :id';

/**
 * PDO的预处理语句prepare()和参数绑定bindValue方法很好的实现了数据过滤，防止SQL注入
 */

/**
 * 生成一个PdoStatement实例，也可以选择直接实例化PdoStatement
 * $statement = new PDOStatement();
 */
$statement = $pdo->prepare($sql);

/**
 * 绑定HTTP的值到:id具名占位符上
 * bindValue绑定的是字符串，希望绑定其他数据类型的话，修改bindValue的第三个参数
 */
$id = filter_input(INPUT_GET, 'id');

/**
 * bindValue实际是在绑定的时候就将值绑定在sql对应的占位符上，即便后期bindValue绑定的值发生改变也不回造成影响
 */
$statement->bindValue(':id', $id, PDO::PARAM_INT);

/**
 * bindParam实际是将一个变量的引用绑定到了预处理语句的占位符上，在execute之前变量发生变化，都会对结果造成影响
 * 因为绑定的变量的值在execute的时候才真正的取值
 */
$statement->bindParam(':id', $id);
$id = 6;

/**
 * 执行预处理语句，成功返回true，失败返回false
 */
$statement->execute();

/**
 * 查询操作的话还需要得到返回的结果集
 * 如果执行了fetch在执行fetchColumn或者fetchObject，结果集是从fetch查询到结果是不包括最开始的fetch查询到的结果的
 * 当然 也不会有人这么做。
 */
try {
    /**
     * fetch从结果集中获取下一行（获取结果集的第一行）
     * fetch和fetchAll第一个参数决定返回结果的格式
     * PDO::FETCH_ASSOC返回一个数据组，数组的键是表的列名
     * PDO::FETCH_NUM返回的数组的键就是普通的0、1、2这种
     * PDO::FETCH_BOTH返回结果中包括上面两种
     * PDO::FETCH_OBJ返回的是一个对象，对象的属性是表的列明
     */
    $res = $statement->fetch(PDO::FETCH_ASSOC);
    /**
     * fetchAll返回一个包含结果集中所有行的数组
     */
//    $res = $statement->fetchAll(PDO::FETCH_ASSOC);
    /**
     * fetchColumn从结果集中的下一行返回单独的一列，如果参数不填默认返回第一列，列的索引从0开始
     */
//    $res = $statement->fetchColumn(1);

    /**
     * 这种方式和fetch选择参数PDO::FETCH_OBJ效果是一样的
     */
//    $res = $statement->fetchObject();
} catch (\PDOException $e) {
    var_dump($e->getMessage());
    die();
}
print_r($res);
die();




