<?php
header("conntent-type:text/html;charset=utf-8");
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';
$name=$_POST['author'];
$publish=time();
if (empty($title) || empty($content)) {
    header('refresh:3;url=add.php');
    echo '标题和内容不能为空';
    exit;
}
$link = require_once 'conn.php';
$sql = "insert into health values (null,'$title','$name','$content','$publish')";
$res = mysqli_query($link, $sql);
if ($res) {
    header('refresh:2;url=heath.php');
    echo  $title . '新增成功';
} else {
    header('refresh:2;url=add.html');
    echo  $title . '新增失败';
}