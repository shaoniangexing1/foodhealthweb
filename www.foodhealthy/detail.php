<?php
$id=$_GET['id']?? 0;
if(!$id){
    header("Refresh:3;url='heath.php'");
    echo '非法访问！';
    exit;
}
$link=require_once 'conn.php';
$sql="select * from health where id=$id";
$res=mysqli_query($link,$sql);
$arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
mysqli_close($link);
require_once "detail.html";
