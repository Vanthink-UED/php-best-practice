# PHP Best Practice

## String

### 字符串连接

我有一个变量，需要与字符串一起输出，可以怎样写？

(现场写... 3min)

### 安全的输出(safety output)

我们经常会用到字符串输出。无论您是字符串输出到浏览器或数据库，你需要小心正确编码字符串。一些字符串数据具有特殊的意义和可能，采取最好的情况下，掩盖输出;在最坏的情况下，输出错误的字符串数据能引起安全漏洞


#### 解决

+ 输出一个url给a标签

+ 输出html

+ 你希望显示或者隐藏一些html

+ 你需要保留一些格式


#### rawurlencode and htmlentities

输出转义的url，输出html内容

#### remove html Tag

使用strip_tags 


### String search

PHP有字符串函数一个强大的集合功能str_replace函数，strpos和substr_replace有三个这样的例子，它们出现在第一个简单的，但我们可以用它们来完成复杂的任务。 str_replace函数替换另一个字符串的所有事件，strpos返回另一个字符串中第一次出现的位置，并substr_replace一个字符串的一部分内替换文本

## Time and Date

`time` 获取当前时间的时间戳

`mktime` 获取指定时间的时间戳


### date
获得最近的日期 `date`


熟记部分含义 https://www.sitepoint.com/premium/books/the-php-anthology-101-essential-tips-tricks-hacks-2nd-edition/online/ch04s02.html#table_placeholder-description


### timezone

`date_default_timezone_set` 设置所在时区 常用的时区：

+ Asia/Shanghai

+ America/New_York

+ America/Los_Angeles

+ Europe/Paris

### 如何获取具体某一天是本周星期几？

`strtotime` + `date`

### 如何获取一个月多少天 ？

`strtotime` + `date｀


TASK: 写个日历


## Files

关于安全性，确保文件权限
禁止远程引入文件eg：include 'http://www.hacker.com/bad_script.txt';

`allow_url_fopen` 设置off

### read a file

? 我们如何将一个代码文件打开并显示行数(类似谷歌浏览器查看源码)

+ file 

+ file_get_contents

+ readfile



### handle  files

fopen fread fwrite

对于大文件呢？

``` php
<?php
$fp = fopen('writeSecureScripts.html', 'rb');
while (!feof($fp)) {
  $chunk = fgets($fp);
  echo $chunk;
}
fclose($fp);
?>
```

### modify local file 

### access information local file

+ file_exists 

+ is_file

+ is_readable 

+ is_writeable 

+ filemtime

+ fileatime

+ filesize

### examine directories 

+ readdir 

+ opendir

+ closedir

使用  dir Class

$dir -> read()


### task show php code

`highlight_string` and `highlight_string`

### store configuration information in a file

创建ini文件使用parse_ini_file

### file download

use a few special HTTP headers and the `readfile `



### PHP 错误

+ syntax errors

+ environmental errors

+ programming errors

+ logic error


### cache

php prevent cache

set header


### Access Control

+ Http Authentication



### deploy your website 


Use revision control software.

Maintain separate development and production branches of your site in your versioning system.

Tag your production branch prior to release.

Write and run unit tests for your code.

Make sure as much of your code as possible is being exercised by your unit tests.



### Security Checklist

＋ Cross-site Scripting (XSS)





## Forms, Tables, and Pretty URLs

### 快速构建表单


$.post('http://weibo.com/aj/mblog/add?ajwvr=6&__rnd=1467268851713',{
    'text': 'test',
})










