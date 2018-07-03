<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/3
 * Time: 9:38
 */
/**
 * Administrator lirongsheng
 * 2018/7/3
 * 删除升级包帮助文档的图片
 */
function deleteImage()
{
    /**
     * 项目根路径
     */

    $root = 'E:\epower\Website';

    /**
     * 从index.txt获取所有需要删除的图片路径
     */

    $content = file_get_contents('E:\svn\www\app\Home\Controller\index.txt');

    /**
     * 判断内容读取成功失败
     */

    if (!$content) {
        exit(json_encode('获取图片路径失败'));
        die();
    }

    /**
     * 我的index.txt图片路径存的是json
     */

    $urls = json_decode($content);

    /**
     * 循环删除图片
     */

    foreach ($urls as $url) {
        if (file_exists($root.$url)) {
            $res = unlink($root . $url);
            if (!$res) {
                exit(json_encode('删除图片失败'));
                die();
            }
        }
    }

    /**
     * 遍历root目录下的uploads下的所有文件夹，删除空文件夹
     */

    deleteEmptyDir($root.'/Uploads');

    exit(json_encode('操作完成'));
    die();
}


/**
 * Administrator lirongsheng
 * 2018/7/3
 * 遍历图片文件夹，删除空文件夹
 */
 function deleteEmptyDir($url)
{
    /**
     * 判断URL是一个目录，且打开不会报错
     */
    if (is_dir($url) && ($handle = opendir($url)) !==false) {
        /**
         * 递归读取，删除空的子文件夹
         */
        while (($file = readdir($handle)) !== false) {
            if ($file!= '.' && $file != '..') {
                /**
                 * 当前目录
                 */
                $current_file = $url.'/'.$file;
                /**
                 * 递归判断子目录
                 */
                deleteEmptyDir($current_file);
                /**
                 * 如果文件夹只有两个文件的话，只可能是.和..  删除文件夹
                 */
                if (count(scandir($current_file)) == 2) {
                    rmdir($current_file);
                }
            }
        }
    }
    /**
     * 关闭一个目录
     */
    closedir($url);
}