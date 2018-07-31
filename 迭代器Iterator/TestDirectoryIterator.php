<?php

/**
 * DirectoryIterator实现了Iterator接口
 * 所以可以直接遍历DirectoryIterator对象
 * 一个实现了Iterator接口的类的实例化可以直接遍历是因为
 * 在使用foreach的时候，会先检测实例所属类有没有实现Iterator接口，有的话就会使用内置方法或者实现类中的方法，模拟foreach语句
 */
$dir = new DirectoryIterator('./test');

foreach ($dir as $item) {
    echo $item;
    echo '<br>';
}