<?php
$data['title']=$_POST['title']??'';
$data['content']=$_POST['content']??'';
$data['name']=$_POST['name']??'';
if(empty($data['title']) || empty($data['content'] ))
{
    header('refresh:3;url=add.php');
    echo '标题和内容不能为空';
    exit;
}
$data=$_POST;
$sql="update health set ";
foreach ($data as $k=>$v){
    $sql.="$k='$v',";
}
$sql= rtrim($sql,",");
$id=$_GET['id'];
$sql.=" where id=$id";
echo $sql.'<br>';
$link=require_once 'conn.php';
$res=mysqli_query($link,$sql);
if($res){
    echo "<script>alert('修改成功！');location.href='heath.php'</script>";
}else{
    echo "修改失败".mysqli_error($link);
}

mysqli_close($link);
