<?php


/**
 * 自动加载器的好处在于将命名空间和文件目录对应起来
 * 不同框架之间只要满足命名空间的要求，就可以使用同一个自动加载器去加载文件
 */

spl_autoload_register(function ($class) {
    /**
     * 定义类的命名空间前缀
     */
    $prefix = 'Foo\\Bar\\';

    /**
     * 定义类的命名空间对应的文件目录
     */
    $base_dir = __DIR__.'/src/';

    /**
     * 判断传入的类是否使用了上面定义的命名空间前缀
     */
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        /**
         * 未使用的话，交给__autoload注册器的下一个自动加载器处理
         */
        return;
    }

    /**
     * 获取去掉前缀之后的类名
     */
    $relative_class = substr($class, $len);

    /**
     * 将命名空间的前缀换成对应的文件目录
     * 把命名空间中的空间分隔符\\替换成目录分隔符/（为了兼容多层子命名空间）
     * 然后后面拼接上.php后缀
     */
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    /**
     * 判断是否有对应文件，有的话引入该文件
     */
    if (file_exists($file)) {
        require  $file;
    }
});

$test = new \Foo\Bar\Baz\Test();