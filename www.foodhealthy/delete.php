<?php
$id=$_GET['id']?? 0;
if(!$id){
    header("Refresh:3;url='heath.php'");
    echo '当前编辑不存在！';
    exit;
}
$link=require_once 'conn.php';
$sql="delete from health where id=$id";
$res=mysqli_query($link,$sql);
if($res){
    echo "<script>alert('删除成功！');location.href='heath.php'</script>";
}else{
    echo "删除失败".mysqli_error($link);
}
mysqli_close($link);
