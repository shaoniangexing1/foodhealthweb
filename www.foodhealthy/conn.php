<?php
$host='localhost';
$user='root';
$paw='123456';
$db="health";
$link=mysqli_connect($host,$user,$paw,$db);
//mysqli_select_db($link,'news');
//mysqli_set_charset($link,'utf8');
if(!$link)
{
    exit('数据库连接失败！'.'<br>'.mysqli_connect_error());
}
/*else
{
    echo '成功';
}*/
return $link;
