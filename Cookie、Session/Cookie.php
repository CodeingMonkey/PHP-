<?php

setcookie('username', 'admin', time()+3600);

/**
 * path代表cookie默认的有效路径，默认是设置cookie时的当前目录，设置成/时对整个域名有效，设置成/test的话则cookie在域名下面的/test目录生效
 * domain代表cookie的有效域名，设置成子域名的时候cookie对子域名和三级域名有效
 * secure设置为true的时候，只有https连接的情况下才会设置cookie
 * httponly设置为true时，只有http能获取cookie，js将不能获取cookie
 */
setcookie('email', '18855998079@163.com', time()+3600, '', '', false, true);

print_r($_COOKIE);