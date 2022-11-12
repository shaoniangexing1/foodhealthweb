<?php
$id=$_GET['id']?? 0;
if(!$id){
    header("Refresh:3;url={$_SERVER['HTTP_REFERER']}");
    echo '当前要编辑不存在！';
    exit;
}
$link=require_once 'conn.php';
$sql="select * from health where id=$id";
$res=mysqli_query($link,$sql);
if(!$res){
    header("Refresh:3;url=index.php");
    echo '当前要编辑不存在！';
    exit;
}
$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
include 'edit.html';
mysqli_free_result($res);
mysqli_close($link);

